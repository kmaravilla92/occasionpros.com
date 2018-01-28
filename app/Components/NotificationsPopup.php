<?php

namespace App\Components;

class NotificationsPopup extends AbstractComponent implements ComponentsInterface
{
    public static function render()
    {

        $currentUser = \Sentinel::getUser();
        $laravelUser = \App\User::find($currentUser->id);
        $userNotifications = collect($laravelUser->notifications)->slice(0, 6);
        $userNotificationsCount = $laravelUser->unreadNotifications->count();
        return view(
            self::VIEW.'.notifications-popup',
            compact(
                'userNotifications',
                'userNotificationsCount'
            )
        );
    }
}