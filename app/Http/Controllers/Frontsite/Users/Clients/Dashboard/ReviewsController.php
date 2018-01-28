<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\EventPost as EventPostEntity;
use App\Services\Pagination\Paginator;
use App\Mail\Events\ClientPostedAReview;
use Mail;
use Illuminate\Http\Request;
use Sentinel;

class ReviewsController extends Controller
{

	public function index(Request $request)
	{

        $currentUser = Sentinel::getUser();

        $eventsReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $currentUser->id
            ),
            [
                'query' => [
                    'relationships' => 'events,events.type,events.selectedPro.testimonial,events.selectedPro.selectedPro.profileInformation'
                ]
            ]
        );

        $user = $eventsReq['results']['data'];

        $limit = config('occ_pros.pagination.limit');

        $myEvents = (new Paginator(
            $user['events'],
            $limit,
            $request->page
        ))->setPath('/clients/reviews');

        $pagination = $myEvents->links()->toHtml();

		return view(
            'frontsite.users.clients.client-reviews',
            compact(
                'myEvents',
                'pagination'
            )
        );
	}

    public function create(Request $request)
    {

        $userReq = $this->httpClient->get(
            sprintf(
                'api/users/%s',
                $request->professional_id
            ),
            [
                'query' => [
                    'relationships' => 'profileInformation,profileInformation.selectedCategories,profileInformation.selectedCategories.professionalCategory'
                ]
            ]
        );

        $user = $userReq['results']['data'];

        $profileInformation = $user['profile_information'];

        $eventPost = EventPostEntity::find($request->event_id);

        $current_user = \Sentinel::getUser();

        $current_user_profile_information = $current_user->profileInformation;

    	return view(
            'frontsite.users.clients.client-write-review',
            compact(
                'user',
                'profileInformation',
                'current_user_profile_information',
                'eventPost'
            )
        );
    }

    public function store(Request $request)
    {

		$response = [
            'success' 		=> false,
            'messages' 		=> [],
            'redirect_to' 	=> '/clients/events',
            'clear_form' 	=> true,
			'timeOut' 		=> 1000
        ];

		$currentUser = Sentinel::getUser();
		$feedbackInput = $request->feedback;
        $rating = 0;
        $rating_field_keys = ['qos','psm','val'];
        foreach($rating_field_keys as $key){
            if(isset($feedbackInput[$key])){
                $rating += (int)$feedbackInput[$key];
            }
        }
        
        $rating /= 3;
        $rating = round($rating, 2);

		$testimonial = \App\Models\Entities\Testimonial::create([
			'title' 		=> 'A review for an event',
			'feedback' 		=> $feedbackInput['feedback'],
			'created_by' 	=> $currentUser->id,
			'created_for' 	=> $feedbackInput['professional_id'],
			'event_id' 		=> $feedbackInput['event_id'],
			'rating' 		=> $rating,
			'status' 		=> '1'
		]);

		$eventSelectedPro = \App\Models\Entities\EventSelectedPro::where([
			'user_id' 		=> $feedbackInput['professional_id'],
			'event_id' 		=> $feedbackInput['event_id'],
		])->first();

        $eventSelectedPro->update([
            'testimonial_id' => $testimonial->id,
            'status' => '2'
        ]);

        $user = $eventSelectedPro->selectedPro()->first();
        $eventPost = EventPostEntity::find($feedbackInput['event_id']);
        if($user && $eventPost){
            \Notification::send(
                [$user],
                (new \App\Notifications\ClientReleasePaymentToPro($eventPost))
            );

            Mail::to($user->email)->send(
                new ClientPostedAReview($eventPost)
            );
        }

		$response['success'] = true;
		$response['messages'][] = 'Successfully posted a review.';

		return response()->json($response);
    }
}
