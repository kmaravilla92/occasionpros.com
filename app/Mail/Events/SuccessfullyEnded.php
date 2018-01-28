<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Entities\EventPost as EventPostEntity;

class SuccessfullyEnded extends Mailable
{
    use Queueable, SerializesModels;

    public $event;

    public $bid_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EventPostEntity $event, $bid_id = null)
    {
        $this->event = $event;

        $this->bid_id = $bid_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view(
            'emails.frontsite.users.clients.event-successfully-ended',
            [
                'data'=> [
                    'event'     => $this->event,
                    'bid_id'    => $this->bid_id
                ]
            ]
        );
    }
}
