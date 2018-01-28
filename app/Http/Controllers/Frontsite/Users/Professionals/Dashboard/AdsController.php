<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\AdPost as AdPostEntity;
use App\Services\Pagination\Paginator;
use App\Services\Payment\Paypal;
use App\Services\Payment\PaypalException;
use Exception;
use Hashids;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index(
        Request $request
    )
    {
        $currentUser = \Sentinel::getUser();
        $ads = AdPostEntity::where('created_by', $currentUser->id)->get();
        $limit = config('occ_pros.pagination.limit');

        $ads = (new Paginator(
            $ads->toArray(),
            $limit,
            $request->page
        ))->setPath('/professionals/ads');

        $pagination = $ads->links()->toHtml();
        $isPro = true;
        return view(
            'frontsite.users.professionals.pro-list-ads',
            compact(
                'ads',
                'pagination',
                'isPro'
            )
        );
    }

    public function show($uid)
    {
        $ad = AdPostEntity::where('uid',$uid)->first();
        $isPro = true;
        return view(
            'frontsite.users.professionals.pro-list-ads-show',
            compact(
                'ad',
                'isPro'
            )
        );
    }

    public function create(
        Request $request
    )
    {
        $ad = null;
        
        $form = [
            'url' => route('frontsite.professionals.ads.store')
        ];

        return view(
            'frontsite.users.professionals.pro-list-ads-create',
            compact(
                'ad',
                'form'
            )
        );
    }

    public function store(
        Request $request,
        Hashids $hashids,
        AdPostEntity $ad
    )
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => true
        ];

        $to_save = [
            'title' => $request->ad['title'],
            'content' => $request->ad['content'],
            'status' => '3',
            'created_by' => \Sentinel::getUser()->id,
            'location' => $request->ad['location'],
            'latitude' => $request->ad['latitude'],
            'longitude' => $request->ad['longitude'],
        ];

        foreach($to_save as $field => $value){
            $ad->{$field} = $value;
        }

        $response['success'] = $ad->save();
        $response['timeOut'] = 2000;
        $response['messages'][] = "Ad Successfully posted.\n Redirecting you now to payment page.";
        $response['redirect_to'] = route(
            'frontsite.professionals.ads.pay',
            [
                'ad_id' => $hashids::encode($ad->id)
            ]
        );

        return response()->json($response);
    }

    public function edit(
        $uid = null,
        Request $request
    )
    {
        $ad = AdPostEntity::where('uid', $uid)->first();

        $form = [
            'url' => route('frontsite.professionals.ads.update', [
                'uid' => $ad['uid']
            ])
        ];

        return view(
            'frontsite.users.professionals.pro-list-ads-create',
            compact(
                'ad',
                'form'
            )
        );
    }

    public function update(
        Request $request,
        $uid = null
    )
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];

        $ad = AdPostEntity::where('uid', $uid)->update([
            'title' => $request->ad['title'],
            'content' => $request->ad['content'],
            'location' => $request->ad['location'],
            'latitude' => $request->ad['latitude'],
            'longitude' => $request->ad['longitude'],
        ]);

        $response['success'] = true;
        $response['messages'][] = 'Ad Successfully updated.';

        return response()->json($response);
    }

    public function destroy(
        Request $request,
        $uid = null
    )
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];

        $ad = AdPostEntity::where('uid', $uid)->delete();

        $response['success'] = true;
        $response['messages'][] = 'Ad Successfully deleted.\n Redirecting you now to the ads listing.';
        $response['redirect_to'] = '/professionals/ads';
        $response['timeOut'] = 2000;

        return response()->json($response);
    }

    public function getRenew(Request $request, $ad_id)
    {
        $paymentFormUrl = route(
            'frontsite.professionals.ads.renew.post',
            [
                'ad_id' => $ad_id
            ]
        );
        return $this->getPay($request, $ad_id,$paymentFormUrl);
    }

    public function postRenew(
        Request $request,
        $ad_id,
        Hashids $hashids,
        AdPostEntity $ad_post_entity,
        Paypal $paypal
    )
    {
        $request->is_renewing = 1;
        return $this->storePay(
            $request,
            $ad_id,
            $hashids,
            $ad_post_entity,
            $paypal
        );
    }

    public function getPay(Request $request, $ad_id = null, $paymentFormUrl = null)
    {
        $parentBlade = 'frontsite.users.professionals.pro-dashboard-main';
        if(is_null($paymentFormUrl)){
            $paymentFormUrl = route(
                'frontsite.professionals.ads.pay.store',
                [
                    'ad_id' => $request->ad_id
                ]
            );
        }
        $metaTitle = '';
        return view(
            'frontsite.common.payment-info',
            compact(
                'parentBlade',
                'paymentFormUrl',
                'metaTitle'
            )
        );
    }

    public function storePay(
        Request $request,
        $ad_id,
        Hashids $hashids,
        AdPostEntity $ad_post_entity,
        Paypal $paypal
    )
    {

        $current_user = \Sentinel::getUser();

        $credit_card = $request->credit_card;
  
        $response = [
            'success' => false,
            'type' => 'success',
            'messages' => []
        ];
        
        try {

            $paymentResult = $paypal->payWithCreditCard([
                'credit_card' => $credit_card,
                'items_list' => [
                    [
                        'title' => 'Ad Post',
                        'description' => 'Ad Post',
                        'amount' => 1,
                        'qty' => 1
                    ]
                ],
                'transaction_details' => [
                    'description' => sprintf(
                        'A payment to %s from %s for an : %s',
                        'Occasion Pros',
                        $current_user->first_name.' '.$current_user->last_name,
                        'Ad Post'
                    ),
                    'invoice_number' => uniqid()
                ]
            ]);

            /**/
            $ad_id = $hashids::decode($ad_id)[0];

            $ad_post = $ad_post_entity
                        ->where('id', $ad_id)
                        ->first();
            
            if(isset($request->is_renewing)){

                $ad_post->expired_at = null;
                $response['messages'][] = "Payment successfully sent.";
                $response['messages'][] = 'Ad successfully renewed.';
                $response['messages'][] = 'Redirecting you now to the ads listing.';

            }else{

                /*$ad_post->status = '0';
                $response['messages'][] = "Payment successfully sent.\n Admin will review you ad.\n Redirecting you now to the ads listing.";*/

                $ad_post->status = '1';
                $ad_post->expired_at = 1;
                $response['messages'][] = "Payment successfully sent.\n Redirecting you now to the ads listing.";
            }

            $response['success'] = $ad_post->save();
            
            if($response['success']){

                $response['clear_form'] = true;
                $response['timeOut'] = 2000;
                $response['redirect_to'] = route('frontsite.professionals.ads');
            }

        } catch(Exception $e) {
            
            $response['type'] = 'error';
            $response['messages'][] = 'Something went wrong. Please try again later.';
            $response['messages'][] = $e->getMessage();
        } catch (PaypalException $ex) {

            $response['type'] = 'error';
            $response['messages'][] = $ex->getErrorMessages();
        }

        return $response;
    }
}
