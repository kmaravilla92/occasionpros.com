<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Repositories\User as UserRepository;

class RegisterController extends Controller
{

    public function create()
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

    	return view('frontsite.users.professionals.pro-sign-up', compact('pro_categories'));
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
            $professionalsGroup = \Sentinel::findRoleByName('Professionals');
            $professionalsGroup->users()->attach(
                $sentinelUser
            );

            $user = \App\User::find($sentinelUser->id);
            $user->name = $userDetails['name'];
            $user->permissions = json_encode([
                'professional' => true
            ]);
            $response['success'] = $user->save();

            $profileInformation = $user->profileInformation()->create([
                'first_name'                    => $request->first_name,
                'last_name'                     => $request->last_name,
                'contact_number'                => $request->contact_number,
                'countries_served'              => $request->countries_served,
                'willing_distance_to_travel'    => $request->willing_distance_to_travel,
				'latitude'    					=> $request->latitude,
				'longitude'   	 				=> $request->longitude,
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

            $profileInformation->selectedCategories()->create([
                'professional_category_id'    =>  $request->category
            ]);

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
