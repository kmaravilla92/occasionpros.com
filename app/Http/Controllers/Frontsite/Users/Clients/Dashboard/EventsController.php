<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventBid as EventBidEntity;
use App\Models\Entities\EventSelectedPro as EventSelectedProEntity;
use App\Models\Entities\Notification as NotificationEntity;
use App\Mail\Events\SuccessfullyEnded as SuccessfullyEndedMailable;
use App\Notifications\ProSelectedForAnEvent;
use App\Services\Pagination\Paginator;
use App\Mail\Events\ClientHiresAPro;
use DB;
use Illuminate\Http\Request;
// use Kreait\Firebase\Factory as FirebaseFactory;
use StdClass as FirebaseFactory;
use Mail;
use Notification as CoreNotification;
use Sentinel;

class EventsController extends Controller
{

	public function index(
        Request $request
    )
	{

	    $currentUser = Sentinel::getUser();

        $eventsReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'events,events.bids,events.type,events.selectedPro'
                ]
            ]
        );

        $user = $eventsReq['results']['data'];

        $limit = config('occ_pros.pagination.limit');

        $myEvents = (new Paginator(
            $user['events'],
            $limit,
            $request->page
        ))->setPath('/clients/events');

        $pagination = $myEvents->links()->toHtml();

		return view(
            'frontsite.users.clients.client-my-event',
            compact(
                'myEvents',
                'pagination'
            )
        );
	}

	public function show(
        $id = null,
        Request $request,
        \Hashids $hashIds
    )
	{

        try{
            $id = $hashIds::decode($id)[0];
        }catch(\Exception $e){}

        $currentUser = Sentinel::getUser();

        $eventsReq = $this->httpClient->get(
            sprintf(
                'api/event-posts/%s',
                $id
            ),
            [
                'query' => [
                    'relationships' => 'type,selectedPro,bids.bidder.profileInformation'
                ]
            ]
        );

        $event = $eventsReq['results']['data'];

        $bids = $event['bids'];

        $winningBid = collect($bids)->whereIn('status', ['1','2','4'])->first();

		return view(
            'frontsite.users.clients.client-my-event-detail',
            compact(
                'event',
                'bids',
                'winningBid'
            )
        );
	}

	public function edit()
	{

	}

	public function update()
	{

	}

    public function create()
    {
    	return view('frontsite.users.clients.client-event-info');
    }

    public function store()
    {

    }

    public function destroy()
    {

    }

    public function getConnectWithPro(
        CoreNotification $coreNotification,
        DB $db,
        EventBidEntity $eventBidEntity,
        EventSelectedProEntity $eventSelectedProEntity,
        FirebaseFactory $firebase,
        NotificationEntity $notificationEntity,
        Request $request
    )
    {
        $response = [
            'success' => true,
            'messages' => ['Successfully hired pro.'],
            'redirect_to' => null,
            'clear_form' => false,
            'timeOut' => 0
        ];

        $db::beginTransaction();

        $winningBid = $eventBidEntity->find($request->bid_id);
        $winningBid->update([
            'status' => '1'
        ]);

        $losingBids = $eventBidEntity->where(function($query) use($winningBid)
        {
            $query
                ->where('event_id', $winningBid->event_id)
                ->where('id', '!=', $winningBid->id);
        });

        if($losingBids->count()) {
            $losingBids->update([
                'status' => '3'
            ]);
        }

        $eventSelectedProEntity->create([
            'event_id'  => $winningBid->event_id,
            'user_id'   => $winningBid->created_by,
            'status'    => '0'
        ]);

        $user = \App\User::find($winningBid->created_by);
        $eventPost = $winningBid->event()->first();
        $notification = $coreNotification::send(
                            [$user],
                            (new ProSelectedForAnEvent($eventPost))
                        );

        Mail::to(
            $user->email
        )->send(
            new ClientHiresAPro(
                $eventPost
            )
        );

        $latestNotification = $notificationEntity->orderBy('created_at','DESC')->limit(1)->first();
        
        // Push Firebase - Start

        try{
            if(config('occ_pros.firebase.enabled')){
                $database = $firebase->create()->getDatabase();
                $userNotifsRefPath = sprintf(
                    'users/%s/notifications',
                    $winningBid->created_by
                );
                $database
                    ->getReference($userNotifsRefPath)
                    ->push([
                        'notification_id' => $latestNotification->id,
                        'content' => $latestNotification->data,
                        'is_read' => 0
                    ]);
            }
        }catch(\Exception $e){
            $db::rollBack();
            $response['messages'] = [$e->getMessage()];
            $response['messages'][] = ['Please try again later.'];
            $response['success'] = false;
            $response['type'] = 'error';
        }

        $db::commit();

        // Firebase - End

        $response['redirect_to'] = '/clients/events/'.$winningBid->event_id;
        return response()->json($response);
    }

    public function postMarkAsComplete(Request $request)
    {
        $response = [
            'success' => true,
            'messages' => ['Event successfully marked as complete.'],
            'redirect_to' => null,
            'clear_form' => false,
            'timeOut' => 0
        ];

        $currentUser = Sentinel::getUser();

        $bid = \App\Models\Entities\EventBid::find($request->winning_bid);
        $bid->update([
            'status' => '2'
        ]);
        $bidEventPost = $bid->event()->first();

        $selectedPro = $bidEventPost->selectedPro()->first();
        $selectedPro->update([
            'status' => '1'
        ]);

        // needs an in-app notification

        Mail::to(
            $selectedPro->selectedPro->email
        )->send(
            new SuccessfullyEndedMailable($bidEventPost, $bid->id)
        );

        // $paymentTransaction = \App\Models\Entities\PaymentTransaction::create([
        //     'code'      => 'EVTCOMP',
        //     'paid_for'  => $bid->created_by,
        //     'paid_by'   => $currentUser->id,
        //     'event_id'  => $bid->event_id,
        //     'amount'    => $bidEventPost->budget_float,
        //     'status'    => '0'
        // ]);
		//
        // $paymentTransaction->code = $paymentTransaction->code.$paymentTransaction->id;
        // $paymentTransaction->save();

        $response['redirect_to'] = '/clients/events/'.$bid->event_id;
        return response()->json($response);
    }
}
