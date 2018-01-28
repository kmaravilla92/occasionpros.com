@inject('images', '\App\Services\File\Images')

@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content my-event-detail ">
		<div class="dash-title clearfix">
			<h3>My Event Detail  <a href="{{route('frontsite.professionals.events')}}" class="f-right ">Event Listing</a></h3>
		</div>
		<div class="event-listing event-detail">
			<div class="posted col">
				<p>Posted {{date('m/d/Y', strtotime($event['created_at']))}}</p>
			</div>
			<div class="img-holder">
				<img src="{{$images->getImage('users/'.$owner['id'].'/dashboard_listing_45x45.jpg')}}" alt="">
			</div>
			<div class="content col">
				<a>{{$owner['first_name']}}'s <span style="color:#000000;"> Event </span>{{$event['title']}} </a>
				<p>{{$event['description']}}</p>
			</div>
			<div class="full-content clearfix">
				<div class="f-left">
					<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">{{$type['title']}}</a></p>
					<p> <i class="fa fa-calendar" aria-hidden="true"></i>{{$event['date']}}</p>
					<p> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$event['location']}}</p>
				</div>
				<div class="f-right budg">
					<h5>Budget: {{$event['budget']}}</h5>
					@if(count($bids) > 0)
						@include(
							'frontsite.users.partials.events.application-status',
							[
								'status' => $bids[0]['status']
							]
						)
					@endif
				</div>
			</div>
			<div class="btn-e-b clearfix">
				<a href="mailto:{{$owner['email']}}" class="trans-btn btn-b-blue f-left"> <i class="fa fa-envelope" aria-hidden="true"></i> <span>({{$owner['first_name']}} {{$owner['last_name']}})</span> {{$owner['email']}}</a>
				<!-- <a href="#" class="trans-btn btn-green f-right"> BID</a> -->
				@if(0 === count($bids))
					@if(isset($maxBidsReached) && $maxBidsReached)
                    <p>
                        @if(isset($userMembership) && strtolower($userMembership->title) == 'pay per bid')
                            <span style="color:#a93f30;max-width:300px;display:inline-block;"><i class="fa fa-exclamation" aria-hidden="true" style="color:#a93f30;"></i>You are on a Pay per bid membership. Buy bids now for only $7.00/bid.</span>
                        @else
                            <span style="color:#a93f30;"><i class="fa fa-exclamation" aria-hidden="true" style="color:#a93f30;"></i>You reached your maximum limit of bids.</span>
                        @endif
                        <br><br>
                        <a href="{{route('frontsite.professionals.events.bids.buy')}}" class="trans-btn btn-green">BUY BIDS</a>
                    </p>
                    @else
                        <a href="#open-event-bid-{{$event['id']}}" class="trans-btn btn-green popup-with-zoom-anim f-right">BID</a>
                        @include(
                            'frontsite.partials.popups.event-bid',
                            [
                                'event' => $event
                            ]
                        )
                    @endif
				@endif
			</div>
			<div class="bid-listing">
				<div class="head">
					<p> <span style="color:#32871c;">Client’s Other Events Posted ({{count($other_events)}})</span></p>
					<hr>
					<p>SEE ALL <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
				</div>
			</div>
		</div>
			@include(
				'frontsite.users.partials.events.list',
				[
					'events' => $other_events,
					'hasOwnerPic' => true
				]
			)
		</div>
	</div>
@endsection
