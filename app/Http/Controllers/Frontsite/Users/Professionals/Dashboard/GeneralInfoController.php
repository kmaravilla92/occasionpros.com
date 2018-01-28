<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\ProfessionalInformation;
use Illuminate\Http\Request;
use Sentinel;

class GeneralInfoController extends Controller
{

    protected $editMode = false;

    public function __invoke()
    {
        $currentUser = Sentinel::getUser();
        
        $userProfileReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'profileInformation'
                ]
            ]
        );

        $user = $userProfileReq['results']['data'];

        $profileInformation = $user['profile_information'];

        $generalInfoKeysList = ProfessionalInformation::getGeneralInfoKeysList();

        $editMode = $this->editMode;

    	return view(
            'frontsite.users.professionals.pro-general-information',
            compact(
                'generalInfoKeysList',
                'profileInformation',
                'editMode'
            )
        );
    }

    public function edit()
    {
        $this->editMode = true;
        return $this->__invoke();
    }

    public function update(Request $request)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];

        $currentUser = Sentinel::getUser();
        $profileInformation = ProfessionalInformation::where('user_id',$currentUser->id)->first();
        if($response['success'] = $profileInformation->update($request->all())) {
            $response['messages'][] = 'Profile successfully updated.';
        }
        return response()->json($response);
    }
}
