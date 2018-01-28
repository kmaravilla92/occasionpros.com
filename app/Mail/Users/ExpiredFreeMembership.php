<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpiredFreeMembership extends Mailable
{
    use Queueable, SerializesModels;

    protected $pro;

    protected $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pro, $type)
    {
        
        $this->pro = $pro;

        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view(
            'emails.frontsite.users.pros.free-membership-expiration-notification',
            [
                'data'=> [
                    'pro' => $this->pro,
                    'type' => $this->type
                ]
            ]
        );
    }
}
