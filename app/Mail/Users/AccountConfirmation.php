<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $activation;

    protected $profile_information;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($activation, $profile_information)
    {
        $this->activation = $activation;

        $this->profile_information = $profile_information;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'emails.frontsite.users.account_confirmation',
            [
                'data'=> [
                    'profile_information'   => $this->profile_information,
                    'confirmation_link'     => route(
                        'frontsite.users.verify', 
                        [
                            'user_id'           =>  $this->profile_information['user_id'],
                            'activation_code'   =>  $this->activation->code
                        ]
                    )
                ]
            ]
        );
    }
}
