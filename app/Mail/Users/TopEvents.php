<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopEvents extends Mailable
{
    use Queueable, SerializesModels;

    protected $pro;

    protected $events;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pro = null, $events = [])
    {
        
        $this->pro = $pro;

        $this->events = $events;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pro_name = $this->pro->full_name;
        return $this->view(
            'emails.frontsite.users.pros.top-events',
            [
                'data'=> [
                    'pro_name' => $pro_name,
                    'events' => $this->events
                ]
            ]
        );
    }
}
