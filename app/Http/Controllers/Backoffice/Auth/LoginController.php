<?php

namespace App\Http\Controllers\Backoffice\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Sentinel;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        return view('backoffice.auth.login');
    }

    public function postLogin(Request $request)
    {
        $to_auth = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        $will_remember = $request->remember_me == 'on';

        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => '/',
            'type' => 'error'
        ];

        $hasException = false;

        try{
            $sentinelUser = Sentinel::authenticate($to_auth,$will_remember);
        }catch(\Exception $e){
            $response['messages'][] = $e->getMessage();
            $hasException = true;
        }

        if(isset($sentinelUser) && $sentinelUser) {

            $can_switch_role = false;

            if($sentinelUser->hasAccess('admin')) {
                $user_role = 'admin';
                $user_switch_to_role = 'admin';
                $response['redirect_to'] = route('admin.dashboard');
                /*return redirect(route('admin.dashboard'));*/
            }

            if($sentinelUser->hasAccess('professional')) {
                $can_switch_role = true;
                $response['redirect_to'] = route('frontsite.professionals.dashboard');
                /*return redirect(route('frontsite.professionals.dashboard'));*/
            }

            if($sentinelUser->hasAccess('client')) {
                $can_switch_role = true;
                $response['redirect_to'] = route('frontsite.clients.dashboard');
                /*return redirect(route('frontsite.clients.dashboard'));*/
            }

            if($current_role = $sentinelUser->current_role){
                \Session::flash('toastr', [
                    'info' => 'Your current role is Client.'
                ]);
                $response['redirect_to'] = route('frontsite.'.$current_role.'s.dashboard');
            }

            if(isset($request->next_url)) {
                $response['redirect_to'] = $request->next_url;
                /*return redirect($request->next_url);*/
            }

            if($can_switch_role){
                $user_role = $sentinelUser->current_role;
                $user_switch_to_role = $user_role == 'client' ? 'professional' : 'client';
                session(['user_role' => $user_role]);
                session(['user_switch_to_role' => $user_switch_to_role]);
            }

            $response['success'] = true;
            $response['messages'][] = 'Logged-in. Redirecting to Dashboard.';
            $response['type'] = 'success';
            $response['timeOut'] = 0;
        }else if(!$hasException){
            $response['messages'][] = 'Incorrect credentials.';
        }

        if($request->ajax()) {
            return response()->json($response);
        }
        // dd($response);
        if($response['success']){
            return redirect($response['redirect_to']);
        }
        
        return redirect(route('admin.login'))->withInput()->with([
            'login' => [
                'input_error_class' => 'has-error',
                'errors' => $response['messages']
            ]
        ]);
    }
}
