<?php

namespace App\Http\Controllers\Frontsite\Users;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Repositories\User as UserRepository;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $pro_categories = \Cache::rememberForever('pro_categories', function()
        {
            $categories = \App\Models\Entities\ProfessionalCategory::orderBy('title', 'ASC')->get();
            $pro_categories = [];
            foreach($categories as $category) {
                $pro_categories[$category->id] = $category->title;
            }
            return $pro_categories;
        });

        $counties = \Cache::rememberForever('counties', function()
        {
            return \DB::table('counties')->pluck('name','name')->toArray();
        });

    	return view('frontsite.users.sign-up', compact('pro_categories','counties'));
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
            $sentinelUser = \Sentinel::register($userDetails);
            $activation = \Activation::create($sentinelUser);
            $group_names = [ucfirst($request->user_type).'s'];
            foreach($group_names as $group_name){
                $group = \Sentinel::findRoleByName($group_name);
                $group->users()->attach(
                    $sentinelUser
                );
            }

            $user = \App\User::find($sentinelUser->id);
            $user->name = $userDetails['name'];
            $user->permissions = json_encode([
                $request->user_type => true
            ]);
            $response['success'] = $user->save();

            $counties_served = '';
            
            if(isset($request->countries_served)){
                $counties_served = implode(',', $request->countries_served);
            }

            $profileInformation = $user->profileInformation()->create([
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
                'contact_number'                => $request->contact_number,
                'countries_served'              => $counties_served,
                'willing_distance_to_travel'    => $request->willing_distance_to_travel,
                'latitude'                      => $request->latitude,
                'longitude'                     => $request->longitude,
                'media'             => json_encode([
                    "images" => [],
                    "videos" => [],
                    "music" => [],
                    "social_links" => [
                        "website" => '',
                        "facebook" => '',
                        "twitter" => '',
                        "pinterest" => '',
                        "instagram" => '',
                    ]
                ])
            ]);

            if(isset($request->user_type) && !empty($request->category)){
                $profileInformation->selectedCategories()->create([
                    'professional_category_id'    =>  $request->category
                ]);
            }

            $notifSettings = [
                'receive_important_account_alerts'      => '1',
                'receive_lead_and_booking_alers'        => '1',
                'receive_notifications_for_new_client_reviews' => '1',
                'receiving_email'                       => $request->email
            ];

            foreach($notifSettings as $notifSettingName => $notifSettingValue) {
                $user->userSettings()->create([
                    'type'  => 'notification_settings',
                    'name'  => $notifSettingName,
                    'value' => $notifSettingValue
                ]);
            }

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

        return response()->json($response);
    }
}
