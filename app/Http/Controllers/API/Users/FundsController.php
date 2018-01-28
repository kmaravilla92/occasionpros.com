<?php

namespace App\Http\Controllers\API\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\PaymentTransaction as PaymentTransactionEntity;

class FundsController extends Controller
{
    public function index(
        Request $request,
        PaymentTransactionEntity $paymentTransactionEntity
    )
    {
        $funds = $paymentTransactionEntity
                    ->with('event','event.owner')
                    ->where('paid_for', (int)$request->id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(
                        config('occ_pros.pagination.limit')
                    );
                    
        if(isset($request->paginateUrl)){
            $funds->setPath($request->paginateUrl);
        }            
        // dd($funds);
        return response()->json([
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => $funds,
                'pagination' => $funds->links()->toHtml()
            ]
        ]);
    }
}
