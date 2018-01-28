<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Entities\EventPost as EventPostEntity;
use App\Models\Entities\EventBid as EventBidEntity;

class ClientReleasedPayment extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event, $amount = 0)
    {
        $this->event = $event;

        $this->amount = $amount;
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
            'emails.frontsite.users.pros.client-released-payment',
            [
                'data'=> [
                    'event' => $this->event,
                    'eventPostOwner' => $eventPostOwner,
                    'amount' => $this->amount
                ]
            ]
        );
    }
}
