<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Entities\EventPost as EventPostEntity;

class NotificationEmailToPros extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $professional;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event, $professional = [])
    {
        $this->event = $event;
        $this->professional = $professional;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $pro_name = $this->professional['full_name'];
        return $this->view(
            'emails.frontsite.users.pros.matched-events',
            [
                'data'=> [
                    'events'        => [$this->event],
                    'pro_name'      => $pro_name
                ]
            ]
        );
    }
}
