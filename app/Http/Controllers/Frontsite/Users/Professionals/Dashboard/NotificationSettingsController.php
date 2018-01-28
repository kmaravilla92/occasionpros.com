<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Entities\UserSetting as UserSettingEntity;
use App\Models\Entities\UserSetting;
use Illuminate\Http\Request;
use Sentinel;

class NotificationSettingsController extends Controller
{
    public function __invoke()
    {
        $currentUser = Sentinel::getUser();

        $userSettingsReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'userSettings.owner'
                ]
            ]
        );

        $user = $userSettingsReq['results']['data'];

        $userSettings = collect($user['user_settings'])->keyBy('name');

    	return view(
            'frontsite.users.professionals.pro-notification',
            compact(
                'userSettings'
            )
        );
    }

    public function update(Request $request)
    {
        $response = [
            'success' => true,
            'messages' => ['Notification Settings successfully updated.'],
            'redirect_to' => null,
            'clear_form' => false
        ];

        $currentUser = Sentinel::getUser();

        UserSetting::where([
            'user_id' => $currentUser->id
        ])->update([
            'value' => null
        ]);

        foreach($request->notification_settings as $name => $value) {
            $notif_settings = UserSetting::where([
                'type' => 'notification_settings',
                'name' => $name
            ])->first();

            if(empty($value)) {
                $value = null;
            }

            if($notif_settings) {
                $notif_settings->update([
                    'value' => $value
                ]);
            }
        }

        return response()->json($response);
    }
}
