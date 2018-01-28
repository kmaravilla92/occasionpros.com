<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventBid as EventBidEntity;
use App\Models\Entities\UserMembership as UserMembershipEntity;
use App\Notifications\ProPostedABid as ProPostedABidNotifiable;
use App\Services\Payment\Paypal;
use App\Services\Payment\PaypalException;
use App\Mail\Events\ProPostedABid as ProPostedABidMailable;
use Hashids;
use Mail;
use Notification as CoreNotification;
use Sentinel;

class EventsController extends Controller
{
    public function getList(
        Request $request,
        Sentinel $sentinel
    )
    {

        $currentUser = $sentinel::getUser();
        $user = \App\User::with('userMembership')->where('id',$currentUser->id)->first();
        $userMembership = $user->userMembership;
        $eventsReq = $this->httpClient->get(
            'api/event-posts',
            [
                'query' => [
                    'checkUserBid'  => 1,
                    'noSelectedPro' => 1,
                    'userId'        => $currentUser->id,
                    'status'        => 2,
                    'paginateUrl'   => '/professionals/events',
                    'page'          => isset($request->page) ? $request->page : 1
                ]
            ]
        );

        $maxBidsReached = false;

        if($userMembership){
            $maxBidsReached = $userMembership->max_bid_remaining == 0;
        }

        $events = $eventsReq['results']['data']['data'];
        $pagination = $eventsReq['results']['pagination'];
        return view(
            'frontsite.users.professionals.pro-list-events',
            compact(
                'events',
                'pagination',
                'maxBidsReached',
                'userMembership'
            )
        );
    }

    public function _bid(
        Request $request,
        EventBidEntity $eventBidEntity,
        CoreNotification $coreNotification
    )
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => '/professionals/events',
            'clear_form' => true
        ];
        $currentUser = Sentinel::getUser();
        $user = \App\User::with('userMembership')->where('id',$currentUser->id)->first();
        $userMembership = $user->userMembership;

        if(!$userMembership){
            $response['success'] = false;
            $response['type'] = 'info';
            $response['clear_form'] = false;
            // $response['redirect_to'] = route('frontsite.professionals.events.bids.buy');
            $response['redirect_to'] = null;
            // $response['timeOut'] = 2000;
            $response['messages'][] = 'You can\'t bid right now. Please choose a membership package first.';
            return response()->json($response);
        }

        if($userMembership && $userMembership->max_bid_remaining == 0){
            $response['success'] = true;
            $response['type'] = 'info';
            $response['clear_form'] = false;
            // $response['redirect_to'] = route('frontsite.professionals.events.bids.buy');
            $response['redirect_to'] = null;
            // $response['timeOut'] = 2000;
            if(strtolower($userMembership->title) == 'pay per bid'){
                $response['messages'][] = 'You are on a Pay per bid membership. Buy bids now for only $7.00/bid.';
            }else{
                $response['messages'][] = 'You reached your maximum limit of bids. Please buy bids now.';
            }
            
            return response()->json($response);
        }
        
        $newBid = $eventBidEntity->create([
            'event_id'      => $request->event_id,
            'created_by'    => $currentUser->id,
            'details'       => $request->bid['details']
        ]);

        if($userMembership){
            $userMembershipOptions = $userMembership->options;
            $userMembershipOptions->max_bid_remaining = ( $userMembershipOptions->max_bid_remaining - 1 );
            $userMembership->options = json_encode($userMembershipOptions);
            $userMembership->save();
        }

        $eventPost = $newBid->event;
        $eventPostOwner = $eventPost->owner;
        $coreNotification::send(
            [$eventPostOwner],
            (new ProPostedABidNotifiable(
                $user,
                $eventPost
            ))
        );

        Mail::to(
            $eventPostOwner->email
        )->send(
            new ProPostedABidMailable(
                $eventPost,
                $newBid
            )
        );
        
        $response['messages'][] = 'Bid successfully sent.';
        $response['success'] = true;
        if(isset($request->next_url)){
            $response['redirect_to'] = $request->next_url;
        }
        return response()->json($response);
    }

    public function getBuyBids(Request $request)
    {
        
        $form = [
            'url' => route('frontsite.professionals.events.bids.pay')
        ];
        return view(
            'frontsite.users.professionals.pro-buy-bids',
            compact('form')
        );
    }

    public function getPayBids(Request $request, $paymentFormUrl = null)
    {
        $parentBlade = 'frontsite.users.professionals.pro-dashboard-main';
        if(is_null($paymentFormUrl)){
            $paymentFormUrl = route(
                'frontsite.professionals.events.bids.buy.post',
                $request->only([
                    'bids_count'
                ])
            );
        }
        $metaTitle = '';
        $package = 1;
        return view(
            'frontsite.common.payment-info',
            compact(
                'parentBlade',
                'paymentFormUrl',
                'metaTitle',
                'package'
            )
        );
    }

    public function postBuyBids(
        Request $request,
         Paypal $paypal
    )
    {

        $amount_to_pay = 7;

        $qty = isset($request->bids_count) ? $request->bids_count : 1;

        $current_user = \Sentinel::getUser();

        $credit_card = $request->credit_card;

        try {

            $paymentResult = $paypal->payWithCreditCard([
                'credit_card' => $credit_card,
                'items_list' => [
                    [
                        'title' => 'Bids Purchase',
                        'description' => 'Bids Purchase',
                        'amount' => $amount_to_pay,
                        'qty' => $qty
                    ]
                ],
                'transaction_details' => [
                    'description' => sprintf(
                        'A payment to %s from %s for : %s',
                        'Occasion Pros',
                        $current_user->first_name.' '.$current_user->last_name,
                        'Bids Purchase'
                    ),
                    'invoice_number' => uniqid()
                ]
            ]);

            /**/

            $user_membership = UserMembershipEntity::firstOrNew([
                'user_id' => $current_user->id,
            ]);

            $user_membership_options = $user_membership->options;
            $user_membership_options->max_bid_remaining += $qty;
            $user_membership->options = json_encode($user_membership_options);
            $response['success'] = $user_membership->save();
            if($response['success']){
                $response['clear_form'] = true;
                $response['timeOut'] = 2000;
                $response['redirect_to'] = route('frontsite.professionals.events');
                $response['messages'][] = "Payment successfully sent.\n Redirecting you now in the events listing.";
            }
        } catch (PaypalException $ex) {
            $response['type'] = 'error';
            $response['messages'][] = $ex->getErrorMessages();
        } catch(Exception $e) {
            $response['type'] = 'error';
            $response['messages'][] = 'Something went wrong. Please try again later.';
        }

        return $response;
    }
    
    public function getHistory(
        Request $request,
        EventBidEntity $eventBidEntity,
        Sentinel $sentinel
    )
    {
        $currentUser = $sentinel::getUser();

        $bids = $eventBidEntity
                    ->with('event.type')
                    ->where('created_by', $currentUser->id)
                    // ->whereIn('status', ['2'])
                    ->orderBy('created_at','DESC')
                    ->paginate(
                        config('occ_pros.pagination.limit')
                    );

        $pagination = $bids->links()->toHtml();

        return view(
            'frontsite.users.professionals.pro-event-history',
            compact(
                'bids',
                'pagination'
            )
        );
    }

    public function getApplied(
        Request $request,
        EventBidEntity $eventBidEntity,
        Sentinel $sentinel
    )
    {
        $currentUser = $sentinel::getUser();

        $bids = $eventBidEntity
                    ->with('event.type')
                    ->where('created_by', $currentUser->id)
                    ->orderBy('created_at','DESC')
                    ->paginate(
                        config('occ_pros.pagination.limit')
                    );

        $pagination = $bids->links('')->toHtml();

    	return view(
            'frontsite.users.professionals.pro-event-applied',
            compact(
                'bids',
                'pagination'
            )
        );
    }

    public function getShow(
        $event_id,
        Request $request,
        Sentinel $sentinel,
        Hashids $hashIds
    )
    {

        $currentUser = $sentinel::getUser();
        $user = \App\User::with('userMembership')->where('id',$currentUser->id)->first();
        $userMembership = $user->userMembership;

        try { $event_id = $hashIds::decode($event_id)[0]; }catch(\Exeception $e){}

        $eventReq = $this->httpClient->get(
            sprintf(
                'api/event-posts/%s',
                $event_id
            ),
            [
                'query' => [
                    'checkUserBid'  => 1,
                    'userId'        => $currentUser->id,
                    'relationships' => 'type,owner.events,owner.events.owner,owner.events.type,bids'
                ]
            ]
        );

        $event = $eventReq['results']['data'];

        $type = $event['type'];

        $owner = $event['owner'];

        $other_events = collect($owner['events'])->filter(function($other_event) use($event)
        {
            return $other_event['status'] == 2 && ($other_event['id'] != $event['id']);
        });

        $bids = $event['bids'];

        $maxBidsReached = false;

        if($userMembership){
            $maxBidsReached = $userMembership->max_bid_remaining == 0;
        }

    	return view(
            'frontsite.users.professionals.pro-event-single',
            compact(
                'event',
                'type',
                'owner',
                'bids',
                'other_events',
                'maxBidsReached',
                'userMembership'
            )
        );
    }
}
