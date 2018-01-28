<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Entities\EventPost as EventPostEntity;
use App\Models\Entities\EventBid as EventBidEntity;

class ProPostedABid extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $bid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event, EventBidEntity $bid)
    {
        $this->event = $event;
        $this->bid = $bid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view(
            'emails.frontsite.users.clients.pro-posted-a-bid',
            [
                'data'=> [
                    'event'         => $this->event,
                    'bid'  => $this->bid
                ]
            ]
        );
    }
}
