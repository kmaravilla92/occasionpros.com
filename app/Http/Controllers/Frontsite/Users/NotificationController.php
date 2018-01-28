<?php

namespace App\Http\Controllers\Frontsite\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User as UserEntity;
use App\Services\Pagination\Paginator;
use Illuminate\Http\Request;
use Sentinel;

class NotificationController extends Controller
{

	public function index(Request $request)
	{

		$currentUser = Sentinel::getUser();
        $laravelUser = UserEntity::find($currentUser->id);
        $myNewNotifications = $laravelUser->unreadNotifications;
        $limit = config('occ_pros.pagination.limit');

        $myNotifications = (new Paginator(
            $laravelUser->notifications->toArray(),
            $limit,
            $request->page
        ))->setPath('/notifications');

        $pagination = $myNotifications->links()->toHtml();

        $mainDashboard = 'frontsite.users.clients.client-dashboard-main';
        if($currentUser->hasAccess('professional')){
        	$mainDashboard = 'frontsite.users.professionals.pro-dashboard-main';
        }
		return view(
			'frontsite.users.notifications.index',
			compact(
				'myNotifications',
				'myNewNotifications',
                'pagination',
				'mainDashboard'
			)
		);
	}

	public function show($notificationId = null, Request $request)
    {
        $response = [
            'success' => true,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false,
            'timeOut' => 0
        ];
    	$currentUser = Sentinel::getUser();
    	$laravelUser = UserEntity::find($currentUser->id);
    	$notification = $laravelUser->notifications->where('id',$notificationId)->first();
        if(!$request->ajax()){
            $notification->markAsRead();
            $notificationsRoute = route(
                'frontsite.notifications'
            );
            $notificationsRoute .= '#'.$notificationId;
            return redirect($notificationsRoute);
        }else{
            if($notification){
                if(isset($request->notif_mark_as_read)){
                    $notification->markAsRead();
                }else{
                    $notification->read_at = null;
                    $notification->save();
                }
            }
            $response['unread_notifications'] = $laravelUser->unreadNotifications;
        }
    	
        return response()->json($response);
    }
}
