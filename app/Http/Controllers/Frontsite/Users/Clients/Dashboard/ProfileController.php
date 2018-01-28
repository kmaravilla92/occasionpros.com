<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;

class ProfileController extends Controller
{
    public function index()
    {
        $currentUser = Sentinel::getUser();

        $userReq = $this->httpClient->get(
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

        $user = $userReq['results']['data'];

        $profileInformation = $user['profile_information'];

    	return view(
            'frontsite.users.clients.client-edit-profile',
            compact(
                'currentUser',
                'user',
                'profileInformation'
            )
        );
    }

    public function update(Request $request, \App\Services\File\Images $images, $id = null)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => true
        ];

        $user = \App\User::find($id);
        $toUpdate = [
            'first_name'    => $request->user['first_name'],
            'last_name'     => $request->user['last_name'],
            'name'          => $request->user['first_name'] .' '. $request->user['last_name'],
            'latitude'      => $request->latitude,
            'longitude'     => $request->longitude
        ];
        $response['status'] = $user->update($toUpdate);

        $profileInformation = $user->profileInformation()->first();
        $toUpdate['location'] = $request->user['location'];
        unset($toUpdate['name']);
        $profileInformation->update($toUpdate);

        if($request->hasFile('profile_pic')){
            $dirPath = storage_path(
                'app/public/uploads/users/'.$user->id.'/'
            );
            $imagePath = storage_path(
                'app/'.$request->profile_pic->store('public/uploads/users/'.$user->id)
            );
            $sections = config('occ_pros.settings.users.profile_pic.sections');
            $images->generateSizes(
                $dirPath,
                $imagePath,
                $sections
            );
        }

        if($response['status']) {
            $response['messages'][] = 'Profile successfully updated.';
        }

        return response()->json($response);
    }
}
