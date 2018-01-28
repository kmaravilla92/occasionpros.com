<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\PaymentTransaction;
use Paypalpayment;

class TransactionController extends Controller
{

    const VIEW = 'backoffice.transactions';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $transactions_groups = PaymentTransaction::all()->groupBy('normalized_status_text');
        $transactions = PaymentTransaction::all();
        return view(
            self::VIEW.'.index',
            compact(
                'transactions'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = PaymentTransaction::findOrFail($id);

        return view(
            self::VIEW.'.show',
            compact(
                'transaction'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return PaymentTransaction::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PaymentTransaction::findOrFail($id)->delete();
    }

    public function getFundRequests()
    {
        $transactions = PaymentTransaction::where('status', '1')->get();

        return view(
            self::VIEW.'.index',
            compact(
                'transactions'
            )
        );
    }

    public function postReleaseFund(Request $request, $transaction_id = null)
    {   
        if(isset($request->transaction_actions)) {
            foreach($request->transaction_actions as $event_action_key => $event_action) {
                switch($event_action_key){
                    case 'release_fund':
                        $transaction = PaymentTransaction::find((int)$transaction_id);
                        if($transaction->status == '2'){
                            return back()->with([
                                'form' => [
                                    'error' => 'Funds has already been released.'
                                ]
                            ]);
                        }

                        $payout = $this->payByPaypal($transaction);

                        if($payout['status'] == 'success'){

                            $paidFor = $transaction->paidFor;

                            \Notification::send(
                                [$paidFor],
                                (new \App\Notifications\OPReleasePaymentToPro($transaction->event))
                            );

                            \Mail::to(
                                $paidFor->email
                            )
                            ->send(
                                new \App\Mail\Events\OPApprovedFundRelease($transaction->feed_amount)
                            );
                            
                            return back()->with([
                                'form' => [
                                    'success' => $payout['messages']
                                ]
                            ]);
                        }else{
                            return back()->with([
                                'form' => [
                                    'error' => $payout['messages']
                                ]
                            ]);
                        }
                    break;
                    default:
                    break;
                }
            }
            return back()->with([
                'form' => [
                    'success' => 'Actions successfully applied.'
                ]
            ]);
        }  

        return back()->with([
            'form' => [
                'info' => 'No actions were applied.'
            ]
        ]); 
    }

    // TODO: Must be moved to another service
    protected function payByPaypal($transaction)
    {
        $paidFor = $transaction->paidFor;
        $payouts = new \PayPal\Api\Payout();
        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");
        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver($paidFor->email) // MUST BE PAYPAL EMAIL
            ->setSenderItemId("2014031400023")
            ->setAmount(new \PayPal\Api\Currency('{
                                "value":"'.$transaction->feed_amount_float.'",
                                "currency":"USD"
                            }'));
        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);    

        $request = clone $payouts;
        $response = [
            'status' => 'success',
            'messages' => []
        ];
        try {
            $_apiContext = Paypalpayment::ApiContext(
                config('paypal_payment.Account.ClientId'),
                config('paypal_payment.Account.ClientSecret')
            );
            
            if(config('occ_pros.settings.payment.enabled')){
                $output = $payouts->createSynchronous($_apiContext);
            }

            $transaction->update([
                'status' => '2'
            ]);
            $response['messages'][] = 'Fund has been successfully released.';
        } catch (\Exception $ex) {
            $response['status'] = 'error';
            $response['messages'][] = $ex->getMessage() .'. Please try again later.';
        }

        $response['messages'] = implode('<br>', $response['messages']);

        return $response;
    }
}
