<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\AdPost as AdPostEntity;
use App\Services\Pagination\Paginator;
use Illuminate\Http\Request;

class AdsController extends Controller
{

	public function getIndex(
        Request $request
    )
    {
        $ads = AdPostEntity::where('status', '1')->get()->filter(function($ad){
            return !$ad->is_expired;
        });
        $limit = config('occ_pros.pagination.limit');

        $ads = (new Paginator(
            $ads->toArray(),
            $limit,
            $request->page
        ))->setPath('/clients/ads');

        $pagination = $ads->links()->toHtml();
        $isPro = false;
        return view(
            'frontsite.users.professionals.pro-list-ads',
            compact(
                'ads',
                'pagination',
                'isPro'
            )
        );
    }

    public function getShow($uid)
    {
        $ad = AdPostEntity::where('uid',$uid)->first();
        if($ad->is_expired){
            // Must show message to client
            return redirect(
                route(
                    'frontsite.clients.ads'
                )
            );
        }
        $isPro = false;
        return view(
            'frontsite.users.professionals.pro-list-ads-show',
            compact(
                'ad',
                'isPro'
            )
        );
    }
}
