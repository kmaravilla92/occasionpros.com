<?php

namespace App\Mail\Events;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OPApprovedFundRelease extends Mailable
{
    use Queueable, SerializesModels;

    public $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($amount = 0)
    {
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view(
            'emails.frontsite.users.pros.payment-request-approval',
            [
                'data'=> [
                    'amount' => $this->amount
                ]
            ]
        );
    }
}
