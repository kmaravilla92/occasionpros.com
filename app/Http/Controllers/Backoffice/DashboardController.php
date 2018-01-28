<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $dashboardItems = [
            'Users' => [
                'count' => \App\User::count(),
                'background' => 'bg-blue',
                'link' => route('backoffice.users.index'),
                'icon' => 'fa-users'
            ],
            'Events' => [
                'count' => \App\Models\Entities\EventPost::count(),
                'background' => 'bg-red',
                'link' => route('backoffice.event-posts.index'),
                'icon' => 'fa-calendar'
            ],
            'Pros Ads' => [
                'count' => \App\Models\Entities\AdPost::count(),
                'background' => 'bg-green',
                'link' => route('backoffice.ad-posts.index'),
                'icon' => 'fa-newspaper-o'
            ],
            'Blog Posts' => [
                'count' => \App\Models\Entities\BlogPost::count(),
                'background' => 'bg-blue',
                'link' => route('blog-posts.index'),
                'icon' => 'fa-file'
            ],
            'Payment Transactions' => [
                'count' => \App\Models\Entities\PaymentTransaction::count(),
                'background' => 'bg-aqua',
                'link' => route('backoffice.transactions.index'),
                'icon' => 'fa-paypal'
            ],
            'Fund Requests' => [
                'count' => \App\Models\Entities\PaymentTransaction::where('status', '1')->count(),
                'background' => 'bg-green',
                'link' => route('backoffice.transactions.index'),
                'icon' => 'fa-money'
            ]
        ];

        return view(
            'backoffice.dashboard.dashboard',
            compact(
                'dashboardItems'
            )
        );
    }
}
