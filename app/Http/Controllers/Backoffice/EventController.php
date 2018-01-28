<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Events\EventConfirmed;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventPost as EventPostEntity;
use App\Models\Repositories\Event as EventPostRepo;
use App\Notifications\EventConfirmedByOP;
use App\Notifications\EventMatchedPros;
use App\Mail\Events\OPVerifiesEventPost;
use Notification as CoreNotification;
use Mail;

class EventController extends Controller
{
    CONST VIEW = 'backoffice.event-posts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_posts = EventPostEntity::all();
        return view(self::VIEW .'.index',compact('event_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return 'Page under construction';
        $event_post = null;
        $event_types = \App\Models\Entities\EventType::orderBy('title', 'ASC')->pluck('title','id');
        $clients = \Sentinel::findRoleByName('Clients')->users()->orderBy('first_name','ASC')->get()->pluck('email','email');
        return view(self::VIEW .'.create',compact('event_post','event_types','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->httpClient->post('api/event-posts', [
            'form_params' => $request->all()
        ]);

        return back()->with([
            'form' => [
                'success' => 'Event post successfully created.'
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function show(EventPostEntity $event_post)
    {
        $event_bids = $event_post->bids()->get();
        return view(self::VIEW .'.show', compact('event_post','event_bids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function edit(EventPostEntity $event_post)
    {
        $event_types = \App\Models\Entities\EventType::orderBy('title', 'ASC')->pluck('title','id');
        $clients = \Sentinel::findRoleByName('Clients')->users()->orderBy('first_name','ASC')->get()->pluck('email','email');
        return view(self::VIEW .'.edit', ['event_post'=>$event_post,'event_types'=>$event_types,'clients'=>$clients]);
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
        $this->httpClient->put('api/event-posts/'.$id, [
            'form_params' => $request->all()
        ]);

        return back()->with([
            'form' => [
                'success' => 'Event post successfully updated.'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EventPostEntity  $event_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventPostEntity $event_post)
    {
        if($event_post->delete()){
            return back()->with([
                'form' => [
                    'success' => 'Blog post successfully deleted.'
                ]
            ]);
        }
    }

    public function postApplySelectedActions(
        $event_id = null,
        Request $request,
        CoreNotification $coreNotification
    )
    {
        $event_post = EventPostEntity::find($event_id);
        $event_owner = $event_post->owner()->first();
        if(isset($request->event_actions)) {
            foreach($request->event_actions as $event_action_key => $event_action) {
                switch($event_action_key){
                    case 'mark_as_confirmed':
                        $event_post->status = '2';
                        $event_post->confirmed_at = date('Y-m-d H:i:s', time());
                        $event_post->update();

                        // Notification

                        $coreNotification::send(
                            [$event_owner],
                            (new EventConfirmedByOP($event_post))
                        );

                        Mail::to(
                            $event_owner->email
                        )->send(
                            new OPVerifiesEventPost(
                                $event_post
                            )
                        );

                    break;
                    case 'mark_as_unconfirmed':
                        $event_post->confirmed_at = NULL;
                        $event_post->update();
                    break;
                    case 'notify_matched_professionals':
                        event(new EventConfirmed($event_post));
                    break;
                    default:
                    break;
                }
            }
            return back()->with([
                'form' => [
                    'success' => 'Actions successfully applied.'
                ]
            ]);
        }
        return back()->with([
            'form' => [
                'info' => 'No actions were applied.'
            ]
        ]);
    }
}
