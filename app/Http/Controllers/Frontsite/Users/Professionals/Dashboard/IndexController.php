<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;

class IndexController extends Controller
{
    public function __invoke(
        Sentinel $sentinel
    )
    {
        $currentUser = $sentinel::getUser();
        $recentProjects = \App\Models\Entities\EventSelectedPro::with([
            'event',
            'event.type',
            'event.owner'
        ])
        ->whereHas('event', function($query)
        {   
            $query->where('status', '2');
        })
        ->where(function($query) use($currentUser){
            $query
                ->where('user_id', $currentUser->id);
        })->limit(4)->get();

        $recentReviews = \App\Models\Entities\Testimonial::with([
            'reviewer.profileInformation'
        ])->where(function($query) use($currentUser){
            $query->where('created_for', $currentUser->id);
        })->orderBy('id','DESC')->limit(4)->get();

    	return view(
            'frontsite.users.professionals.pro-dashboard',
            compact(
                'recentProjects',
                'recentReviews'
            )
        );
    }
}
