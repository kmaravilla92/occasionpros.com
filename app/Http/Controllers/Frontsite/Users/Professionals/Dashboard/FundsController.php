<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;

class FundsController extends Controller
{
    public function getHistory(
        Request $request
    )
    {
        $currentUser = Sentinel::getUser();

        $userFundsReq = $this->httpClient->get(
            sprintf(
                'api/users/%s/funds',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'event,event.owner',
                    'paginateUrl'   => '/professionals/funds/history',
                    'page'          => isset($request->page) ? $request->page : 1
                ]
            ]
        );

        $funds = $userFundsReq['results']['data']['data'];
        $pagination = $userFundsReq['results']['pagination'];
    	return view(
            'frontsite.users.professionals.pro-fund-history',
            compact(
                'user',
                'funds',
                'pagination'
            )
        );
    }

    public function postRequestFundTransfer(Request $request)
    {
        $response = [
            'success' => true,
            'messages' => ['Fund transfer successfully requested.'],
            'redirect_to' => '/professionals/funds/history',
            'clear_form' => false,
            'timeOut' => 0
        ];

        $currentUser = Sentinel::getUser();

        $paymentTransaction = \App\Models\Entities\PaymentTransaction::where(function($query) use($currentUser, $request)
        {
            $query
                ->where('paid_for', $currentUser->id)
                ->where('id',$request->payment_transaction_id);
        })->first();

        if($paymentTransaction) {
            $paymentTransaction->update([
                'status' => '1'
            ]);
        }

        return response()->json($response);
    }
}
