<?php

namespace App\Http\Controllers\Frontsite\Pages;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Frontsite\ContactSendEnquiry;
use App\Http\Controllers\Controller;
use App\Mail\ContactUsEnquiry;
use Mail;

class ContactUsController extends Controller
{
    public function getIndex()
    {
        return view('frontsite.pages.contact_us');
    }

    public function postSendEnquiry(ContactSendEnquiry $request)
    {
        Mail::to('admin@occassionspros.com')
            ->cc('happiweekend@gmail.com')
            ->bcc('kimluari@gmail.com')
            ->send(new ContactUsEnquiry($request));

        return response()->json([
            'success' => true,
            'messages' => [
                trans('messages.contact_us.inquire.succeeded')
            ],
            'clear_form' => true,
            // 'redirect_to' => '/contact-us',
            //'timeOut' => 2000
        ]);
    }
}
