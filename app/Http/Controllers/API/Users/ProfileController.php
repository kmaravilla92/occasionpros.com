<?php

namespace App\Http\Controllers\API\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Entities\ProfessionalInformation as ProfessionalInformationEntity;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $userProfile = ProfessionalInformationEntity::where('user_id', $request->id)->first();

        return response()->json([
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => $userProfile
            ]
        ]);
    }
}