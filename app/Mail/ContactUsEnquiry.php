<?php

namespace App\Mail;

use App\Http\Requests\Frontsite\ContactSendEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsEnquiry extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactSendEnquiry $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->request->all();
        unset(
            $data['_token'],
            $data['hidden_recaptcha'],
            $data['g-recaptcha-response']
        );
        return $this
                ->from($this->request->email,$this->request->name)
                ->view('emails.frontsite.contact_us_enquiry')
                ->with([
                    'data' => $data
                ]);
    }
}
