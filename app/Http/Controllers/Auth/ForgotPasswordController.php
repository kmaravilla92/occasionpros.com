<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Sentinel;
use Activation;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {

        $laravelUser = User::where('email', $request->email)->first();
        if($laravelUser){
            $sentinelUser = Sentinel::findById($laravelUser->id);
            if($sentinelUser){
                $hasActivation = Activation::exists($sentinelUser);
                if($hasActivation){
                    return response()->json([
                        'success' => false,
                        'type' => 'error',
                        'messages' => [
                            'Password retrieving failed.',
                            'The account that was associated with email `'.$request->email.'` is not yet activated.',
                            'Click <a href="'.route('frontsite.users.activation.resend', [$laravelUser->id]).'"> <u>HERE</u> </a> to resend an account verification email.'
                        ],
                        'redirect_to' => null,
                        'clear_form' => false
                    ]);
                }
            }
        }

        $this->validate($request, ['email' => 'required|email']);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return response()->json([
                'success' => true,
                'messages' => [
                    'Instructions were sent to your e-mail address for retrieving your password.'
                ],
                'redirect_to' => null,
                'clear_form' => true
            ]);
            //return back()->with('status', trans($response));
        }

        // If an error was returned by the password broker, we will get this message
        // translated so we can notify a user of the problem. We'll redirect back
        // to where the users came from so they can attempt this process again.
        return response()->json([
            'success' => false,
            'type' => 'error',
            'messages' => [
                trans($response)
            ],
            'redirect_to' => null,
            'clear_form' => false
        ]);
        /*return back()->withErrors(
            ['email' => trans($response)]
        );*/
    }
}
