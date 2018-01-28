<?php

namespace App\Models\Repositories;

use App\User as UserEntity;
use App\Models\Repositories\RepositoryInterface;
use Mailchimp;
use Mailchimp_Error;
use Mailchimp_List_AlreadySubscribed;
use Sentinel;

class User extends BaseRepository implements RepositoryInterface
{
    public static function findAll($options = [])
    {
        $userEntity = new UserEntity;
        return $userEntity->prepareOptions($options)->get();
    }

	public static function findById($id = null, $options = [])
	{
	    $userEntity = new UserEntity;
		return $userEntity->prepareOptions($options)->where('id', $id)->first();
	}

    public static function registerNew($options = [])
    {
        $user_details = isset($options['user_details']) ? $options['user_details'] : [];
        $roles = isset($options['roles']) ? $options['roles'] : [];
        $login = isset($options['login']) ? $options['login'] : false;
        $login_on_exist = isset($options['login_on_exist']) ? $options['login_on_exist'] : false;
        $subscribe_to_newsletter = isset($options['subscribe_to_newsletter']) ? $options['subscribe_to_newsletter'] : false;
    }

	public static function register($userDetails = [], $roles = [], $login = false, $login_on_exist = false, $subscribe_to_newsletter = false)
    {
        $data = [
            'created' => false,
            'existed' => false,
            'loggedin' => false
        ];

        try{
            $sentinelUser = Sentinel::registerAndActivate($userDetails);
            
        }catch(\Exception $e) {
            $data['existed'] = true;
        }finally{

            if(isset($sentinelUser)) {
                $user = UserEntity::find($sentinelUser->id);
            }else{
                $user = UserEntity::where('email', $userDetails['email'])->first();
            }

            $sentinelUser = Sentinel::findById($user->id);

            $permissionsToSave = [];
            if(count($roles)) {
                foreach($roles as $role_slug => $role_name) {
                    $professionalsGroup = Sentinel::findRoleBySlug($role_slug.'s');
                    try{
                        $professionalsGroup->users()->attach(
                            $sentinelUser
                        );
                        $permissionsToSave[$role_slug] = true;

                        switch($role_slug){
                            case 'client':
                                $profileInformation = $user->profileInformation()->create([
                                    'first_name'                    => $user->first_name,
                                    'last_name'                     => $user->last_name
                                ]);
                            break;
                            case 'professional':
                                $profileInformation = $user->profileInformation()->create([
                                    'first_name'                    => $user->first_name,
                                    'last_name'                     => $user->last_name,
                                    'contact_number'                => "",
                                    'countries_served'              => "",
                                    'willing_distance_to_travel'    => "",
                                    'latitude'                      => "",
                                    'longitude'                     => "",
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

                                $notifSettings = [
                                    'receive_important_account_alerts'      => '1',
                                    'receive_lead_and_booking_alers'        => '1',
                                    'receive_notifications_for_new_client_reviews' => '1',
                                    'receiving_email'                       => $user->email
                                ];

                                foreach($notifSettings as $notifSettingName => $notifSettingValue) {
                                    $user->userSettings()->create([
                                        'type'  => 'notification_settings',
                                        'name'  => $notifSettingName,
                                        'value' => $notifSettingValue
                                    ]);
                                }
                            break;
                        }

                    }catch(\Exception $e){dd($e->getMessage());}
                }

                if(count($permissionsToSave)){
                    $user->permissions = json_encode($permissionsToSave);
                }
            }

            $user->name = $userDetails['name'];

            $data['created'] = $user->save();
        }

        if($login || ( $data['existed'] && $login_on_exist )) {
            $data['loggedin'] = Sentinel::login($sentinelUser);
        }

        if($subscribe_to_newsletter){
            self::subscribeToNewsletter($user->email);
        }

        return $data;
    }

    public static function subscribeToNewsletter($email)
    {
        $mailChimp = new Mailchimp;
        $listId = config('occ_pros.mailchimp.lists.top_profiles.id');
        try{
            $mailChimp
            ->lists
            ->subscribe(
                $listId,
                ['email' => $email]
            );
        }catch(Mailchimp_List_AlreadySubscribed $e) {

        }catch(Mailchimp_Error $e){
            
        }
    }
}
