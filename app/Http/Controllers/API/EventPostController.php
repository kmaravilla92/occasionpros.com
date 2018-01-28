<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\EventPosted;
use App\Models\Entities\EventPost as EventPostEntity;

class EventPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => []
        ];

        $events = EventPostEntity::with('type');

        if(isset($request->checkUserBid)) {
            if(isset($request->noSelectedPro)) {
                $events = $events->whereDoesntHave('selectedPro', function($query) use($request)
                    {
                        $query->where('user_id', '!=', $request->userId);
                    });
            }

            if(isset($request->hasApplied)) {
                $events = $events->whereHas('bids', function($query) use($request)
                {
                    $query->where('created_by', $request->userId);
                });
            }

            $events = $events->with([
                'bids' => function($query) use($request)
                {
                    $query->where('created_by', $request->userId);
                }
            ]);
        }

        if(isset($request->status)) {
            $events = $events->where('status', $request->status);
        }

        $events = $events->orderBy('id', 'DESC')->paginate(config('occ_pros.pagination.limit'));
        if(isset($request->paginateUrl)){
            $events->setPath($request->paginateUrl);
        }

        $data['results']['data'] = $events;
        $data['results']['pagination'] = $events->links()->toHtml();
        // dd($data);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data'  =>  null
            ]
        ];

        $event                  = new EventPostEntity;
        $event->title           = $request->title;
        $event->description     = $request->description;
        $event->slug            = str_slug($event->title);
        $event->event_type_id   = $request->event_type_id;
        $event->email           = $request->email;
        $event->contact_number  = $request->contact_number;
        $event->date            = date('Y-m-d H:i:s', strtotime($request->date));
        $event->location        = $request->location;
        $event->latitude        = $request->latitude;
        $event->longitude       = $request->longitude;
        $event->budget          = $request->budget;
        $event->status          = '0';

        if(isset($request->email)){
            $creator = \App\User::where('email', $request->email)->first();
            if($creator){
                $event->created_by      = $creator->id;
            }else{
                $event->created_by      = 0;
            }
        }else{
            $event->created_by      = 0;
        }

        if($event->save()) {
            $event = EventPostEntity::with('owner')->where('id',$event->id)->first();
            event(new EventPosted($event,$request->all()));
            $data['results']['data'] = $event;
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id = null)
    {
        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data'  =>  null
            ]
        ];

        $relationships = [];

        if(isset($request->relationships)){
            $relationships = explode(',', $request->relationships);
        }

        $event = EventPostEntity::where('id', $id);

        foreach($relationships as $relationship) {
            $event = $event->with($relationship);
        }

        if(isset($request->checkUserBid)) {
            $event = $event->with([
                'bids' => function($query) use($request)
                {
                    $query->where('created_by', $request->userId);
                }
            ]);
        }

        $data['results']['data'] = $event->first();

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data'  =>  null
            ]
        ];

        $event                  = EventPostEntity::find($id);
        $event->title           = $request->title;
        $event->description     = $request->description;
        $event->slug            = str_slug($event->title);
        $event->event_type_id   = $request->event_type_id;
        if(isset($request->email)){
            $event->email           = $request->email;
        }
        $event->contact_number  = $request->contact_number;
        $event->date            = date('Y-m-d H:i:s', strtotime($request->date));
        $event->location        = $request->location;
        $event->latitude        = $request->latitude;
        $event->longitude       = $request->longitude;
        $event->budget          = $request->budget;
        $event->status          = $request->status;

        if(isset($request->email)){
            $creator = \App\User::where('email', $request->email)->first();
            if($creator){
                $event->created_by      = $creator->id;
            }else{
                $event->created_by      = 0;
            }
        }else{
            $event->created_by      = 0;
        }

        if($event->save()) {
            /*$event = EventPostEntity::with('owner')->where('id',$event->id)->first();
            event(new EventPosted($event,$request->all()));*/
            $data['results']['data'] = $event;
        }

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
