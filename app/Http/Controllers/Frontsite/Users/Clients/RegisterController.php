<?php

namespace App\Http\Controllers\Frontsite\Users\Clients;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Repositories\User as UserRepository;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
    	return view('frontsite.users.clients.client-sign-up');
    }

    public function store(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];

        $userDetails = $request->all();
        $userDetails['name'] = $userDetails['first_name'] . ' ' . $userDetails['last_name'];
        try{
            // $sentinelUser = \Sentinel::registerAndActivate($userDetails);
            $sentinelUser = \Sentinel::register($userDetails);
            $activation = \Activation::create($sentinelUser);
            $professionalsGroup = \Sentinel::findRoleByName('Clients');
            $professionalsGroup->users()->attach(
                $sentinelUser
            );

            $user = \App\User::find($sentinelUser->id);
            $user->name = $userDetails['name'];
            $user->permissions = json_encode([
                'client' => true
            ]);
            $response['success'] = $user->save();

            $profileInformation = $user->profileInformation()->create([
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
            ]);

            \Mail::to(
                $user->email
            )
            ->send(
                new \App\Mail\Users\AccountConfirmation($activation, $profileInformation)
            );

            if(isset($request->sign_me_up)){
                try{
                    UserRepository::subscribeToNewsletter($user->email);
                }catch(\Exception $e){}
            }

            $response['messages'][] = 'Thank you. We sent an email for your account verification.';
            $response['clear_form'] = true;
        }catch(\Exception $e){
            // $response['messages'][] = $e->getMessage();
            $response['type'] = 'error';
            $response['messages'][] = 'E-mail already registered.';
        }

        if(isset($request->next_url) && !empty($request->next_url)) {
            try{
                \Sentinel::authenticate([
                    'email'     => $userDetails['email'],
                    'password'  => $userDetails['password']
                ],false);
                $response['redirect_to'] = $request->next_url;
            }catch(\Exception $e){
                // $response['type'] = 'error';
                // $response['messages'][] = 'You must activate first your account.';
            }
        }

        return response()->json($response);
    }
}
