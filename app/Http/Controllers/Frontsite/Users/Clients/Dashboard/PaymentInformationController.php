<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Payment\Paypal;
use App\Services\Payment\PaypalException;
use Exception;
use Paypalpayment;
use Sentinel;

class PaymentInformationController extends Controller
{
    public function __invoke($bid_id, Request $request)
    {
        $parentBlade = 'frontsite.users.clients.client-dashboard-main';
        $paymentFormUrl = route(
            'frontsite.clients.payment-info.store',
            [
                'bid_id' => $request->bid_id
            ]
        );
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

    public function store($bid_id, Request $request, Paypal $paypal)
    {

        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => 'null',
            'clear_form' => false,
            'timeOut' => 0
        ];

        $currentUser = Sentinel::getUser();
        $bid = \App\Models\Entities\EventBid::find($bid_id);
        $bidder = $bid->bidder->first();
        $eventPost = $bid->event()->first();

        $creditCard = $request->credit_card;

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $_apiContext = Paypalpayment::ApiContext(
                config('paypal_payment.Account.ClientId'),
                config('paypal_payment.Account.ClientSecret')
            );
            
            // dd(config('paypal_payment.Mode'));
            
            if(config('paypal_payment.Mode') == 'live'){
                $paymentResult = $paypal->payWithCreditCard([
                    'credit_card' => $creditCard,
                    'items_list' => [
                        [
                            'title' => $eventPost->title,
                            'description' => $eventPost->description,
                            'amount' => 1,
                            'qty' => $eventPost->budget_float
                        ]
                    ],
                    'transaction_details' => [
                        'description' => sprintf(
                            "A payment to %s from %s for the event: %s",
                            $bidder->first_name.' '.$bidder->last_name,
                            $currentUser->first_name.' '.$currentUser->last_name,
                            $eventPost->title
                        ),
                        'invoice_number' => uniqid()
                    ]
                ]);
            }else{
                $paymentResult = new \StdClass();
                $paymentResult->id = 'TESTONLY';

            }

            $paymentTransaction = new \App\Models\Entities\PaymentTransaction();
            $paymentData = [
                // 'code'      => 'EVTCOMP',
                'code'          => $paymentResult->id,
                'paid_for'      => $bid->created_by,
                'paid_by'       => $currentUser->id,
                'event_id'      => $bid->event_id,
                'amount'        => $eventPost->budget_float,
                'feed_amount'   => $paymentTransaction->applyFee($eventPost->budget_float),
                'status'        => '0'
            ];
            
            foreach($paymentData as $key => $value){
                $paymentTransaction->{$key} = $value;
            }

            $paymentTransaction->save();
            
            $bid->status = '4';
            $bid->save();

            $paidFor = $paymentTransaction->paidFor;

            $eventPost = $paymentTransaction->event;

            \Notification::send(
                [$paidFor],
                (new \App\Notifications\ClientReleasePaymentToPro($eventPost))
            );

            \Mail::to(
                $paidFor->email
            )->send(
                new \App\Mail\Events\ClientReleasedPayment(
                    $eventPost,
                    $eventPost->budget_float
                )
            );

            $response['redirect_to'] = '/clients/events/'.$bid->event_id;
            $response['success'] = true;
            $response['messages'][] = 'Payment successfully sent.';
        } catch (Exception $e) {
            $response['type'] = 'error';
            $response['messages'][] = 'Something went wrong. Please try again later.';
            $response['messages'][] = $e->getMessage();
            // $response['messages'][] = $e->getLine();
        } catch (PaypalException $ex) {

            $response['type'] = 'error';
            $response['messages'][] = $ex->getErrorMessages();
        }

        return response()->json($response);
    }
}
