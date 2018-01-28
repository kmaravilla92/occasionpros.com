<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\AdPost as AdPostEntity;
use App\User as UserEntity;
use Illuminate\Http\Request;
use Sentinel;

class AdController extends Controller
{
    CONST VIEW = 'backoffice.ad-posts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad_posts = AdPostEntity::all();
        return view(
            self::VIEW .'.index',
            compact('ad_posts')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        UserEntity $user_entity
    )
    {
        $ad_post = null;
        $clients = $user_entity->orderBy('first_name','ASC')->get()->pluck('full_name','id');
        return view(
            self::VIEW .'.create',
            compact(
                'ad_post',
                'clients'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(
        Request $request,
        AdPostEntity $ad_entity,
        Sentinel $sentinel
    )
    {

        $ad_data = $request->ad;

        $ad_entity::create([
            'title'         => $ad_data['title'],
            'content'       => $ad_data['content'],
            'status'        => $ad_data['status'],
            'created_by'    => $sentinel::getUser()->id,
            'location'      => $ad_data['location'],
            'latitude'      => $ad_data['latitude'],
            'longitude'     => $ad_data['longitude'],
        ]);
        
        return back()->with([
            'form' => [
                'success' => 'Ad post successfully created.'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function show(AdPostEntity $ad_post)
    {
        return view(self::VIEW .'.show', compact('ad_post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function edit(
        AdPostEntity $ad_post,
        UserEntity $user_entity
    )
    {
        $clients = $user_entity->orderBy('first_name','ASC')->get()->pluck('full_name','id');
        return view(
            self::VIEW .'.edit',
            compact(
                'ad_post',
                'clients'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Sentinel $sentinel,
        AdPostEntity $ad_entity
    )
    {

        $ad_data = $request->ad;

        $ad_entity->save([
            'title'         => $ad_data['title'],
            'content'       => $ad_data['content'],
            'status'        => $ad_data['status'],
            'location'      => $ad_data['location'],
            'latitude'      => $ad_data['latitude'],
            'longitude'     => $ad_data['longitude'],
        ]);
        
        return back()->with([
            'form' => [
                'success' => 'Ad post successfully updated.'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdPostEntity $ad_post)
    {
        if($ad_post->delete()){
            return back()->with([
                'form' => [
                    'success' => 'Ad post successfully deleted.'
                ]
            ]);
        }
    }
}
