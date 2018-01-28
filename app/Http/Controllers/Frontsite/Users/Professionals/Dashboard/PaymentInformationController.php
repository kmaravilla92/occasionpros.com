<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Pagination\Paginator;
use Illuminate\Http\Request;
use Sentinel;

class PaymentInformationController extends Controller
{
    public function __invoke(Request $request)
    {
        $parentBlade = 'frontsite.users.professionals.pro-dashboard-main';
        $paymentFormUrl = route('frontsite.professionals.payment-information.post');
        $metaTitle = '';
        $withPaypalEmail = true;
        return view(
            'frontsite.common.payment-info',
            compact(
                'parentBlade',
                'paymentFormUrl',
                'metaTitle',
                'withPaypalEmail'
            )
        );
    }
}
