<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Entities\EventPost as EventPostEntity;

class ClientPostedAReview extends Notification
{
    use Queueable;

    protected $eventPost;

    protected $dataToSave = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $eventPost)
    {
        $this->eventPost = $eventPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $this->setDataToSave($notifiable);
        $user_notification_settings = $notifiable->userSettings()->where(function($query)
            {
                $query
                    ->where('type', 'notification_settings')
                    ->where('name', 'receive_notifications_for_new_client_reviews');
            })->first();

        $notification_types = ['database'];
        if($user_notification_settings && $user_notification_settings->value == '1'){
            $notification_types[] = 'mail';
        }
        return $notification_types;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $this->setDataToSave($notifiable);
        $user_notification_settings = $notifiable->userSettings()->where(function($query)
            {
                $query
                    ->where('type', 'notification_settings')
                    ->where('name', 'receiving_email');
            })->first();

        if($user_notification_settings && isset($user_notification_settings->value)){
            $notifiable->email = $user_notification_settings->value;
        }

        return (new MailMessage)
                    ->subject('Client event review')
                    ->line($this->dataToSave['message']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $this->setDataToSave($notifiable);
        return $this->dataToSave;
    }

    protected function setDataToSave($notifiable)
    {

        if(!is_null($this->dataToSave)){
            return $this->dataToSave;
        }

        $messageTemplate = config('occ_pros.notification_messages.pros.event_review_posted');
        $owner = $this->eventPost->owner;
        $ownerName = $owner->full_name;
        $eventName = $this->eventPost->title;
        $eventLink = route(
            'frontsite.professionals.events.details',
            [
                'event_id' => $this->eventPost->uid
            ]
        );
        $message = strtr($messageTemplate,[
            '{_event_owner_name_}' => $ownerName,
            '{_event_name_}' => sprintf(
                '<b><a href="%s">%s</a></b>',
                $eventLink,
                $eventName
            )
        ]);
        $excerpt = mb_strimwidth(
            strip_tags($message), 
            0, 
            config('occ_pros.settings.notifications.excerpt_limit')
        );

        $this->dataToSave = [
            'excerpt' => $excerpt,
            'message' => $message,
            'from_user' => $owner->toArray()
        ];
    }
}
