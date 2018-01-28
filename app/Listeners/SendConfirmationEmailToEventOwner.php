<?php

namespace App\Listeners;

use App\Events\EventPosted;
use App\Mail\Events\ConfirmationEmailToOwner;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendConfirmationEmailToEventOwner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EventPosted  $event
     * @return void
     */
    public function handle(EventPosted $event)
    {
        $eventPost = $event->event;
        $owner = $eventPost->owner;
        Mail::to($owner->email)
            ->send(new ConfirmationEmailToOwner($eventPost));
        // ->queue(new NotificationEmailToPros($event->event));
    }
}
