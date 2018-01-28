<?php

namespace App\Http\Controllers\Frontsite\Events;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventPost as EventPostEntity;
use Faker\Generator as FakerGenerator;
use Illuminate\Http\Request;
use Nexmo;
use Sentinel;
use Session;

class EventController extends Controller
{
    public function create(Request $request, Sentinel $sentinel)
    {
        if(!$sentinel::getUser()) {
            return redirect(
                route(
                    'frontsite.sign-up',
                    [
                        'next_url' => route('frontsite.events.create')
                    ]
                )
            )->with([
                'toastr' => [
                    'error' => 'You must have account to create an event.'
                ]
            ]);
        }

        $eventTypes = \App\Models\Entities\EventType::orderBy('title', 'ASC')->pluck('title','id');

    	return view(
            'frontsite.events.create',
            compact(
                'eventTypes'
            )
        );
    }

    public function store(Request $request)
    {
        $this->httpClient->post('api/event-posts', [
            'form_params' => $request->all()
        ]);
        return response()->json([
            'success' => true,
            'messages' => [
                trans('messages.events.create.succeeded')
            ],
            'clear_form' => true,
            'redirect_to' => isset($request->next) ? $request->next : '/clients/events'
        ]);
    }

    public function getVerify(Request $request, FakerGenerator $faker)
    {
        $eventPost = EventPostEntity::find($request->event_id);

        if($eventPost->is_sms_verified){
            Session::flash('toastr', [
                'success' => 'Your event has already been verified.'
            ]);
            return back();
        }

        $toUpdate = [
            'status' => '1'
        ];
        if(!isset($eventPost->sms_verification_code)){
            $toUpdate['sms_verification_code'] = $faker->numberBetween(11111, 99999);
        }
        $eventPost->update($toUpdate);

        if(isset($request->reverify)){
            Session::flash('toastr', [
                'success' => 'Your event has been successfuly verified.'
            ]);
            return back();
        }

        Nexmo::message()->send([
            'to'   => $eventPost->contact_number,
            'from' => config('services.nexmo.sms_from'),
            'text' => sprintf('Your OP event verification code is: %s', $eventPost->sms_verification_code)
        ]);

        if(isset($request->resend_sms_code)){
            $successMessage = 'A new verification code has been sent to you via SMS for the final verification.';
        }else{
            $successMessage = 'Event successfully verified via email. A verification code has been sent to you via SMS for the final verification.';
        }

        Session::flash('toastr', [
            'success' => $successMessage
        ]);

        return redirect(
            route(
                'frontsite.events.verify-by-sms',
                [
                    'event_uid' => $eventPost->uid
                ]
            )
        );
    }

    public function getVerifyBySms(Request $request)
    {
        $eventPost = EventPostEntity::where('uid', $request->event_uid)->firstOrFail();
        return view(
            'frontsite.events.verification-sms',
            compact(
                'eventPost'
            )
        );
    }

    public function postVerifyBySms(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'clear_form' => false
        ];

        $eventPost = EventPostEntity::where('uid', $request->event_uid)->firstOrFail();
        $sms_verification_code = $request->input('sms_verification_code');
        if($eventPost->is_sms_verified){
            $response['success'] = true;
            $response['type'] = 'info';
            $response['messages'] = [
                'Event has already been verified via SMS.'
            ];
        }else if($eventPost && $eventPost->sms_verification_code === $sms_verification_code){
            $eventPost->update([
                'status' => '2'
            ]);
            $response['success'] = true;
            $response['clear_form'] = true;
            $response['messages'] = [
                'Event successfully verified.'
            ];
        }else{
            $response['type'] = 'error';
            $response['messages'] = [
                'Invalid SMS verification code.'
            ];
        }
        return response()->json($response);
    }

    protected function _generateSMSVerificationCode(EventPostEntity $eventPost)
    {

    }
}
