<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Sentinel;

class AccountInformationController extends Controller
{
    public function __invoke()
    {
        $user = Sentinel::getUser();
    	return view(
            'frontsite.users.professionals.pro-acct-info',
            compact(
                'user'
            )
        );
    }

    public function putUpdatePassword(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => true
        ];

        $currentUser = Sentinel::getUser();
        $userCurrentPasswordCheck = Hash::check($request->passwords['current'],$currentUser->password);

        if(!$userCurrentPasswordCheck){
            $response['messages'][] = 'Incorrect Current Password.';
            $response['type'] = 'error';
            return response()->json($response);
        }

        // current password is correct

        $currentUser->password = Hash::make($request->passwords['new']);
        if($response['success'] = $currentUser->save()) {
            $response['messages'][] = 'Password successfully updated.';
        }
        return response()->json($response);
    }

    public function putUpdateEmail(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => true
        ];

        $currentUser = Sentinel::getUser();

        if($request->new_email === $currentUser->email){
            $response['success'] = true;
            $response['messages'][] = 'E-mail didn\'t change.';
            $response['type'] = 'info';
            return response()->json($response);
        }

        $userCurrentPasswordCheck = Hash::check($request->current_password,$currentUser->password);

        if(!$userCurrentPasswordCheck){
            $response['messages'][] = 'Incorrect Current Password.';
            $response['type'] = 'error';
            return response()->json($response);
        }

        $validator = \Validator::make([
                'email' => $request->new_email
            ], [
            'email' => [
                'required',
                \Illuminate\Validation\Rule::unique('users')->ignore($currentUser->id)
            ]
        ],[
            'email.required' => 'E-mail is required.',    
            'email.exists' => 'E-mail already exists.'
        ]);
        // dd($request->all(),$validator->errors());
        if($validator->errors()->count() > 0){
            foreach($validator->errors()->all() as $error){
                $response['messages'][] = $error;        
            }
            $response['type'] = 'error';
            return response()->json($response);
        }

        // current password is correct

        $currentUser->email = $request->new_email;
        if($response['success'] = $currentUser->save()) {
            $response['messages'][] = 'E-mail successfully updated.';
        }
        return response()->json($response);
    }

}
