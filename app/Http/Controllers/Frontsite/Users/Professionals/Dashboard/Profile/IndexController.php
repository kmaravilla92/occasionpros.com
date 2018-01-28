<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard\Profile;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\ProfessionalInformation;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {

        $currentUser = Sentinel::getUser();

        $userId = null;

        if($currentUser){
            $userId = $currentUser->id;
        }

        if(isset($request->professional_id)){
            $userId = $request->professional_id;
        }

        $userProfileReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $userId
            ),
            [
                'query' => [
                    'relationships' => 'profileInformation,profileInformation.selectedCategories,profileInformation.selectedCategories.professionalCategory,testimonials,testimonials.event.type,testimonials.event.owner.profileInformation'
                ]
            ]
        );

        $user = $userProfileReq['results']['data'];

        $profileInformation = $user['profile_information'];

        $media = $profileInformation['media'];

        $recentReviews = $user['testimonials'];

        $generalInfoKeysList = ProfessionalInformation::getGeneralInfoKeysList();

        $isMyProfileView = true;
        $bladeToExtend = 'frontsite.users.professionals.pro-dashboard-main';
        if(isset($request->professional_id)){
            $isMyProfileView = false;
            $bladeToExtend = 'frontsite.layouts.main';
        }

        try{
            $isDJ = collect($profileInformation['selected_categories'])->filter(function($selected_category){
                return $selected_category['professional_category'][0]['title'] == 'DJs';
            })->count() > 0;
        }catch(\Exception $e){
            $isDJ = null;
        }

    	return view(
            'frontsite.users.professionals.pro-db-profile',
            compact(
                'user',
                'profileInformation',
                'media',
                'recentReviews',
                'generalInfoKeysList',
                'isMyProfileView',
                'bladeToExtend',
                'isDJ'
            )
        );
    }

    public function getEdit()
    {
        $userId = Sentinel::getUser()->id;

        $userProfileReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $userId
            ),
            [
                'query' => [
                    'relationships' => 'profileInformation,profileInformation.selectedCategories,testimonials.event.owner.profileInformation,userMembership'
                ]
            ]
        );

        $user = $userProfileReq['results']['data'];

        $profileInformation = $user['profile_information'];

        $selectedCategoriesIds = collect($profileInformation['selected_categories'])->map(function($c)
            {
                return $c['professional_category_id'];
            })->toArray();

        $pro_categories = \Cache::get('pro_categories');

        $userMembership = $user['user_membership'];

        $maxCategories = isset($userMembership['max_categories']) ? $userMembership['max_categories'] : 1;

        $select2Options = [
            'maximumSelectionLength' => isset($userMembership['max_categories_remaining']) ? $userMembership['max_categories_remaining'] : 1,
            'tags' => true
        ];

        $counties = \Cache::get('counties');

        $counties_served = explode(',', $profileInformation['countries_served']);

    	return view(
            'frontsite.users.professionals.pro-edit-profile',
            compact(
                'user',
                'profileInformation',
                'selectedCategoriesIds',
                'pro_categories',
                'userMembership',
                'maxCategories',
                'select2Options',
                'counties',
                'counties_served'
            )
        );
    }

    public function putUpdateProfile(Request $request, \App\Services\File\Images $images)
    {

        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];
        $currentUser = Sentinel::getUser();
        $user = \App\User::find($currentUser->id);
        $profileInformation = $user->profileInformation()->first();
        $profileInformationData = $request->profile_information;
        $categories = $profileInformationData['category'];
           
        $profileInformationData['countries_served'] = implode(',', $request->profile_information['countries_served']);

        $toSaveCatetories = [];

        if(count($categories)){
            foreach($categories as $index => $category){
                if(empty($category)){
                    continue;
                }
                $toSaveCatetories[] = new \App\Models\Entities\ProfessionalSelectedCategory([
                    'professional_information_id' => $profileInformation->id,
                    'professional_category_id' => $category
                ]);
            }
            $profileInformation->selectedCategories()->delete();
            $profileInformation->selectedCategories()->saveMany($toSaveCatetories);
        }

        unset(
            $profileInformationData['category'],
            $profileInformationData['profile_pic']
        );

        if($request->hasFile('profile_pic')){
            $dirPath = storage_path(
                'app/public/uploads/users/'.$currentUser->id.'/'
            );
            $imagePath = storage_path(
                'app/'.$request->profile_pic->store('public/uploads/users/'.$currentUser->id)
            );
            $sections = config('occ_pros.settings.users.profile_pic.sections');
            $images->generateSizes(
                $dirPath,
                $imagePath,
                $sections
            );
        }
        $user->first_name = $profileInformationData['first_name'];
        $user->last_name = $profileInformationData['last_name'];
        $user->name = $user->first_name .' '. $user->last_name;
        $user->save();
        $response['success'] = $profileInformation->update($profileInformationData);
        $response['messages'][] = 'Profile successfully updated.';
        return response()->json($response);
    }
}
