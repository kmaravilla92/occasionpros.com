<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard\Profile;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\ProfessionalInformation as ProfessionalInformationEntity;

class SocialController extends Controller
{
    public function index()
    {
        $currentUser = \Sentinel::getUser();
        $user = ProfessionalInformationEntity::select('user_id','media')->where('user_id', $currentUser->id)->first();
        $social_links = $user->media->social_links;
    	return view(
            'frontsite.users.professionals.pro-edit-connectivity',
            compact(
                'social_links'
            )
        );
    }

    public function update(Request $request, $id = null)
    {
        $user = ProfessionalInformationEntity::where('user_id', $id)->first();
        $media = $user->media;
        $media->social_links = $request->social_links;
        $user->media = json_encode($media);
        $user->update();
        return response()->json([
            'success' => true,
            'messages' => [
                'Social links have been successfully saved.'
            ]
        ]);
    }
}
