<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;

class VideosController extends Controller
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

        $videos = $profileInformation['media']['videos'];

        $userMembership = $user['user_membership'];

        $maxVideos = isset($userMembership['max_video']) ? $userMembership['max_video'] : 1;

        $maxVideosRemaining = isset($userMembership['max_video_remaining']) ? $userMembership['max_video_remaining'] : (count($videos) ? 0 : 1);

        return view(
            'frontsite.users.professionals.pro-edit-video',
            compact(
                'profileInformation',
                'videos',
                'userMembership',
                'maxVideos',
                'maxVideosRemaining'
            )
        );
    }

    public function postSaveVideos(Request $request)
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
        $videos = $request['media']['videos'];
        if(0 === count($videos)) {
            $videos = [];
        }

        $videos = collect($videos)->filter(function($video){
            return !empty($video);
        });

        $media = $profileInformation->media;
        $media->videos = $videos;
        $profileInformation->media = json_encode($media);
        $profileInformation->save();

        $userMembership = $user->userMembership;

        if($userMembership){
            $savedVideosCount = count($media->videos);
            $userMembershipOptions = $userMembership->options;
            $userMembershipOptions->max_video_remaining = ( $userMembershipOptions->max_video - $savedVideosCount );
            $userMembership->options = json_encode($userMembershipOptions);
            $userMembership->save();
        }

        $response['success'] = 1 === 1;
        $response['messages'][] = 'Videos successfully saved';
        return response()->json($response);
    }
}
