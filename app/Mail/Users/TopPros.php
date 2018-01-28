<?php

namespace App\Mail\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopPros extends Mailable
{
    use Queueable, SerializesModels;

    protected $client;

    protected $pros;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client = null, $pros = [])
    {

        $this->client = $client;

        $this->pros = $pros;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $client_name = $this->client->full_name;
        return $this->view(
            'emails.frontsite.users.clients.top-professionals',
            [
                'data'=> [
                    'client_name' => $client_name,
                    'pros' => $this->pros
                ]
            ]
        );
    }
}
