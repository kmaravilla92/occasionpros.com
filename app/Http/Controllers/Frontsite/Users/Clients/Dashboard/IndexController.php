<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cache;
use Illuminate\Http\Request;
use Sentinel;

class IndexController extends Controller
{
    public function __invoke()
    {
        $currentUser = Sentinel::getUser();
        $recentEventsReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'events,events.type,profileInformation'
                ]
            ]
        );

        $user = $recentEventsReq['results']['data'];

        $recentEvents = array_slice($user['events'], 0, 5);

        $pro_categories = Cache::get('pro_categories');

    	return view(
            'frontsite.users.clients.client-dashboard',
            compact(
                'user',
                'recentEvents',
                'pro_categories'
            )
        );
    }
}
