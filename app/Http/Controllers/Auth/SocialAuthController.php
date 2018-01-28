<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Repositories\User as UserRepository;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{

    public function setInfo($driver = 'facebook', $user_type = 'client', Request $request)
    {
        session([
            'social.auth.user_type' => $user_type,
            'social.auth.driver' => $driver
        ]);

        return redirect(
            route('auth.social.redirect')
        );
    }
    
    public function redirect(Request $request)
    {
        $driver = session('social.auth.driver');
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Request $request)
    {
        $user_type = session('social.auth.user_type');
        $roles = [
            $user_type => true
        ];

        $user = Socialite::driver(session('social.auth.driver'))->user();
        $userDetails = [];
        $userDetails['name'] = $user->name;
        $userName = explode(' ', $userDetails['name']);
        $userDetails['first_name'] = $userName[0];
        $userDetails['last_name'] = end($userName);
        if(isset($user->email)) {
            $userDetails['email'] = $user->email;
        }else{
            $userDetails['email'] = $user->id.'@facebook.com';
        }
        $userDetails['password'] = $user->id;

        $user = \App\User::where('email',$userDetails['email'])->first();
        $sentinel_user = null;
        if($user){
            $sentinel_user = \Sentinel::findById($user->id);
        }
        if($user_type == 'unidentified'){
            if($sentinel_user){
                \Sentinel::login($sentinel_user);
                return redirect(
                    route('frontsite.professionals.dashboard')
                );
            }else{
                $roles = [
                    'professional' => true,
                    'client' => true
                ];
                // \Session::flash('toastr', [
                //     'error' => 'Social account not found. Please register first.'
                // ]);
                // return redirect(
                //     route('frontsite.home')
                // );
            }
        }

        if($sentinel_user){
            $roles_to_check = ['client','professional'];
            foreach($roles_to_check as $role_to_check){
                // if($sentinel_user->hasAccess($role_to_check)){
                //     dd($userDetails['email'],$role_to_check,$user_type);
                // }
                if($sentinel_user->hasAccess($role_to_check) && $role_to_check != $user_type){
                    \Session::flash('toastr', [
                        'error' => 'You social account has already been registered as a '. (ucfirst($role_to_check)).'. Registering as a '.ucfirst($user_type).' is prohibited.'
                    ]);
                    return redirect(
                        route('frontsite.home')
                    );
                }
            }
        }

        $userRegister = UserRepository::register((array)$userDetails, $roles, true, true);
        return redirect(
            route('frontsite.professionals.dashboard')
        );
    }
}
