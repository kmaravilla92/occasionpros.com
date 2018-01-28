<?php

namespace App\Http\Controllers\Backoffice\Marketing;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventPost as EventPostEntity;
use App\User as UserEntity;
use App\Mail\Users\TopEvents as TopEventsMailable;
use App\Mail\Users\TopPros as TopProsMailable;
use Cache;
use Illuminate\Http\Request;
use Mail;
use Sentinel;

class EmailBlastController extends Controller
{
    
	const VIEW = 'backoffice.marketing.email_blasts';

	public function getIndex(Request $request)
	{

		if(isset($request->clear_cache)){
			Cache::forget('backoffice.email_blast_types');
		}

		$email_blast_types = Cache::remember('backoffice.email_blast_types', 60, function()
		{
			return [
				'Send Top Events' => [
					'description' => 'Send top events to Pros',
					'show_link' => route('backoffice.marketing.send-top-events')
				],
				'Send Top Pros' => [
					'description' => 'Send top pros to clients',
					'show_link' => route('backoffice.marketing.send-top-pros')
				],
				/*'Send Matched Events to Pros' => [
					'description' => 'Send matched events to pros',
					'show_link' => route('backoffice.marketing.send-matched-events-to-pros')
				],*/
			];
		});
		
		return view(
			self::VIEW . '.index',
			compact(
				'email_blast_types'
			)
		);
	}

    public function getSendTopEvents(Request $request)
    {

    	// Must be pulled as well in the mailchimp subscription list
    	$prosGroup = \Sentinel::findRoleBySlug('professionals');
    	$pros = $prosGroup->users()->orderBy('email','ASC')->get();

    	$events = EventPostEntity::where('status', '2')->orderBy('title','ASC')->get();

        return view(
			self::VIEW . '.send_top_events',
			compact(
				'pros',
				'events'
			)
		);
    }

    public function postSendTopEvents(Request $request)
    {

    	if(
    		0 === count($request->events)
    		|| 
    		0 === count($request->recipients)
    	) {
    		return back()->with([
	            'form' => [
	                'error' => 'No recipients/events has been selected.'
	            ]
	        ]);
    	}

        $events = EventPostEntity::where(function($query) use($request)
        	{
        		$query
        			->whereIn('id', $request->events)
        			->where('status', '2');
        	})->get();

        $pros = UserEntity::whereIn('id', $request->recipients)->get();

	    if(
	    	$pros->count() 
	    	&& 
	    	$events->count()
	    ) {
	        foreach($pros as $pro) {
	            Mail::to(
	            	$pro->email
	            )->send(
	                new TopEventsMailable($pro, $events)
	            );
	        }

	        return back()->with([
	            'form' => [
	                'success' => 'Email blast successfully sent.'
	            ]
	        ]);
	    }
    }

    public function getSendTopPros(Request $request)
    {
    	// Must be pulled as well in the mailchimp subscription list
    	$clientsGroup = \Sentinel::findRoleBySlug('clients');
    	$clients = $clientsGroup->users()->orderBy('email','ASC')->get();

    	$prosGroup = \Sentinel::findRoleBySlug('professionals');
    	$pros = $prosGroup->users()->orderBy('email','ASC')->get();

        return view(
			self::VIEW . '.send_top_pros',
			compact(
				'clients',
				'pros'
			)
		);
    }

    public function postSendTopPros(Request $request)
    {

    	if(
    		0 === count($request->pros)
    		|| 
    		0 === count($request->recipients)
    	) {
    		return back()->with([
	            'form' => [
	                'error' => 'No recipients/clients has been selected.'
	            ]
	        ]);
    	}

        $clients = UserEntity::whereIn('id', $request->recipients)->get();

        $pros = UserEntity::with('profileInformation','profileInformation.selectedCategories','profileInformation.selectedCategories.professionalCategory')->whereIn('id', $request->pros)->get();
        
	    if($clients->count() && $pros->count()){
	        foreach($clients as $client){
	            Mail::to(
	            	$client->email
	            )->send(
	                new TopProsMailable($client, $pros->toArray())
	            );
	        }

	        return back()->with([
	            'form' => [
	                'success' => 'Email blast successfully sent.'
	            ]
	        ]);
	    }
    }

    public function getSendMatchedEventsToPros(){}
    public function postendMatchedEventsToPros(){}
}
