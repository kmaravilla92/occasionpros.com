<?php

namespace App\Listeners;

use App\Events\EventConfirmed;
use App\Mail\Events\NotificationEmailToPros;
use App\Notifications\EventMatchedPros;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Notification as CoreNotification;
use Sentinel;

class SendNotificationToPros
{
    use InteractsWithQueue;

    protected $coreNotification;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CoreNotification $coreNotification)
    {
        $this->coreNotification = $coreNotification;
    }

    /**
     * Handle the event.
     *
     * @param  EventPosted  $event
     * @return void
     */
    public function handle(EventConfirmed $event)
    {
        $eventPost = $event->event;

        if(in_array(config('app.env'), ['local[OFF]'])) {
            $pros = [
                ['email'=>'kimluari@gmail.com','first_name'=>'Kim','last_name'=>'Maravilla'],
                ['email'=>'kimluari+123@gmail.com','first_name'=>'Kim','last_name'=>'Maravilla'],
            ];
        }else{
            // Must pull pros that match the event
            $prosGroup = Sentinel::findRoleByName('Professionals');
            $pros = [];
            if($prosGroup) {
                $prosIds = $prosGroup->getUsers()->pluck('id')->toArray();
                $pros = \App\User::with([
                        'userSettings'=>function($query)
                        {
                            $query->whereIn('name', ['receive_lead_and_booking_alers','receiving_email']);
                        }
                ])->whereIn('id', $prosIds)->get();
            }
        }

        if(count($pros) > 0) {
            foreach($pros as $pro) {
                $proArr = $pro;
                if($pro instanceof \App\User) {
                    $userSettings = null;
                    $proArr = $pro->toArray();
                    if(isset($proArr['user_settings'])) {
                        $userSettings = collect($proArr['user_settings'])->keyBy('name');
                        $email = $userSettings['receiving_email']['value'];
                        $receiveLeads = $userSettings['receive_lead_and_booking_alers'];
                        if($receiveLeads['value'] != 1) {
                            continue;
                        }
                    }
                }else{
                    $email = $pro['email'];
                }

                Mail::to($email)
                    ->send(new NotificationEmailToPros($eventPost,$proArr));
                // ->queue(new NotificationEmailToPros($eventPost));

                // Notification
                $coreNotification = $this->coreNotification;
                $coreNotification::send(
                    $pro,
                    (new EventMatchedPros($eventPost))
                );      
  
            }
        }
    }
}
