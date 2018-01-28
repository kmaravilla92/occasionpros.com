<?php

namespace App\Http\Controllers\API\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as UserEntity;
use App\Models\Entities\EventPost as EventPostEntity;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $user = UserEntity::with('events.type')->find($request->id);

        return response()->json([
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => $user
            ]
        ]);
    }

    public function create(){}
    public function store(){}

    public function show(Request $request, $id, $event_id)
    {
        $id = (int)$id;
        $event_id = (int)$event_id;
        $eventPosts = EventPostEntity::where('created_by', $id)->where('id', $event_id)->first();
        return [
            $eventPosts,
            $request->user_id,
            $id,
            $event_id
        ];
    }

    public function edit(){}

    public function update(){}
    public function delete(){}
}