<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Entities\EventPost as EventPostEntity;
use App\Models\Entities\EventBid as EventBidEntity;

class ClientPostedAReview extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $eventPostOwner = $this->event->owner;
        return $this->view(
            'emails.frontsite.users.pros.client-posted-a-review',
            [
                'data'=> [
                    'event' => $this->event,
                    'eventPostOwner' => $eventPostOwner
                ]
            ]
        );
    }
}
