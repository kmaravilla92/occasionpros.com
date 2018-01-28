<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Storage;

class ImagesController extends Controller
{
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
                    'relationships' => 'profileInformation,userMembership'
                ]
            ]
        );

        $user = $userProfileReq['results']['data'];

        $profileInformation = $user['profile_information'];

        $userMembership = $user['user_membership'];

        $images = $profileInformation['media']['images'];

        $dropzoneOptions = [
            'selector'=>'#dropfile-zone',
            'url'=>route('frontsite.professionals.profile.images.upload'),
            'accepted_files' => 'image/*',
            // 'accepted_files_extension' => '.jpeg,.jpg,.png,.gif',
            'max_files_count'=> isset($userMembership['max_photos']) ? $userMembership['max_photos'] : 1,
            'max_files_remaining'=> isset($userMembership['max_photos_remaining']) ? $userMembership['max_photos_remaining'] : (count($images) ? 0 : 1)
        ];

        if(is_null($images)) {
            $images = [];
        }

    	return view(
            'frontsite.users.professionals.pro-edit-images',
            compact(
                'profileInformation',
                'userMembership',
                'images',
                'dropzoneOptions'
            )
        );
    }

    public function postUpload(Request $request)
    {
        $tempUrl = $request->file->store('public/uploads/temp');
        $fullUrl = str_replace('public','storage',$tempUrl);
        return response()->json([
            'tempUrl' => $tempUrl,
            'fullUrl' => asset($fullUrl)
        ]);
    }

    public function postSaveImages(Request $request, Storage $storage)
    {
        $response = [
            'success' => false,
            'messages' => [],
            'redirect_to' => null,
            'clear_form' => false
        ];
        $userId = Sentinel::getUser()->id;
        $user = \App\User::find($userId);
        $profileInformation = $user->profileInformation;
        $media = $profileInformation->media;
        $userMembership = $user->userMembership;

        if(count($request['files']) > 0) {
            $imagesPathToSave = [];
            foreach($request['files'] as $fileTempPath) {
                $_fileName = explode('/', $fileTempPath);
                $fileName = end($_fileName);
                $fileDestinationPath = 'public/uploads/users/'.$userId.'/media/images/'.$fileName;
                $imagesPathToSave[] = str_replace('public','/storage', $fileDestinationPath);
                if($storage::exists($fileDestinationPath)){
                    continue;
                }
                $storage::copy(
                    $fileTempPath,
                    $fileDestinationPath
                );
            }
            $media->images = $imagesPathToSave;
        }else{
            $media->images = [];
        }

        $profileInformation->media = json_encode($media);
        $profileInformation->save();

        if($userMembership){
            $savedImagesCount = count($profileInformation->media->images);
            $userMembershipOptions = $userMembership->options;
            $userMembershipOptions->max_photos_remaining = ( $userMembershipOptions->max_photos - $savedImagesCount );
            $userMembership->options = json_encode($userMembershipOptions);
            $userMembership->save();
        }

        $response['success'] = 1 === 1;
        $response['messages'][] = 'Images successfully saved';
        return response()->json($response);
    }
}
