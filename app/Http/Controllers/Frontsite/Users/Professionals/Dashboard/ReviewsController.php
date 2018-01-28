<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Pagination\Paginator;
use Illuminate\Http\Request;
use Sentinel;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = Sentinel::getUser();
        $userProfileReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'testimonials.event.type,testimonials.event.owner.profileInformation'
                ]
            ]
        );

        $user = $userProfileReq['results']['data'];

        $limit = config('occ_pros.pagination.limit');

        $recentReviews = (new Paginator(
            $user['testimonials'],
            $limit
        ))->setPath('/professionals/reviews');

        $pagination = $recentReviews->links()->toHtml(); 

    	return view(
            'frontsite.users.professionals.pro-rating-testi',
            compact(
                'recentReviews',
                'pagination'
            )
        );
    }
}
