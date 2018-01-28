<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProSelectedForAnEvent extends Notification
{
    use Queueable;

    protected $eventPost;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($eventPost)
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
        return ['database'];
        // return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }
    
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $messageTemplate = config('occ_pros.notification_messages.pros.event_hired');
        $owner = $this->eventPost->owner;
        $ownerName = $owner->full_name;
        $eventLink = route(
            'frontsite.professionals.events.details',
            [
                'event_id' => $this->eventPost->uid
            ]
        );
        $eventName = $this->eventPost->title;
        $message = strtr($messageTemplate,[
            '{_event_owner_name_}' => sprintf('<b>%s</b>', $ownerName),
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
        return [
            'excerpt' => $excerpt,
            'message' => $message
        ];
    }
}
