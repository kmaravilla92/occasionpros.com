@inject('images','\App\Services\File\Images')

@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content">
		<div class="dash-title clearfix">
			<h3>DASHBOARD</h3>
		</div>
		<div class="col  left-col" >
				<div class="my-recent-events" style="background:url('{{asset('/frontsite/images/recent-pro-bg.jpg')}}')">
				<div class="title clearfix">
					<h3 class="f-left">Recent Projects</h3>
					<a href="{{route('frontsite.professionals.events.history')}}" class="f-right">See all</a>
				</div>
				<ul class="listing">
					@forelse($recentProjects as $recentProject)
                        <?php
                            $event = $recentProject['event'];
                            $eventOwner = $recentProject['event']['owner'];
                        ?>
						<li class="ease">
							<a href="{{route('frontsite.professionals.events.details',[$recentProject['event_id']])}}">
								<div class="img-holder">
									<img src="{{$images->getImage('users/'.$eventOwner['id'].'/profile_115x115.jpg')}}" alt="">
								</div>
								<div class="text">
									<h3>{{$eventOwner['first_name']}}'s<span> Event</span> {{$event['title']}} </h3>
									<p>Type: {{$event['type']['title']}}</p>
									<p>Date: {{$event['date']}}</p>
									<p>Budget: {{$event['budget']}}</p>
								</div>

							</a>
						</li>
					@empty

					@endforelse
				</ul>
			</div>

			<div class="col left-under" style="background:url('{{asset('/frontsite/images/rating-bg.jpg')}}')">
				<div class="title clearfix">
					<h3 class="f-left">Recent Ratings & Testimonials</h3>
					<a href="{{route('frontsite.professionals.reviews')}}" class="f-right">Read all</a>
				</div>
				<ul>
					@forelse($recentReviews as $recentReview)
                        <?php
                            $reviewer = $recentReview->reviewer()->first();
                            $profileInformation = $reviewer->profileInformation()->first();
                        ?>
                        <li>
                            <a href="{{route('frontsite.professionals.events.details',[$recentReview['event_id']])}}">{{$recentReview['title']}}</a>
                            <div class="rating">
                                <label for="">OVERALL</label>
                                @include('frontsite.partials.ratings', ['rating' => $recentReview['rating']])
                            </div>
                            <p>Reviewed by {{$profileInformation['first_name']}} {{$profileInformation['last_name'][0]}}., {{$profileInformation['location']}} {{$recentReview['reviewed_at']}}</p>
                        </li>
                    @empty

                    @endforelse
				</ul>
			</div>
		</div>
		<div class="col right-col">
			<div class="user-profile">
				<div class="img-holder">
					<img class="center-div" src="{{$images->getImage('users/'.$currentUser->id.'/profile_115x115.jpg')}}" alt="">
				</div>
				<div class="text-holder">
					<h3>Welcome back</h3>
					<h4>
						{{$currentUser->first_name}} {{$currentUser->last_name}}
						@if(isset($laravelUser->profileInformation) && isset($laravelUser->profileInformation->location) && $laravelUser->profileInformation->location != '')
							<br> {{$laravelUser->profileInformation->location}}
						@endif
					</h4>
					<label for="">{{$laravelUser->membership_title}}</label>
					<a href="{{route('frontsite.professionals.membership')}}" class="btn btn-yellow">Upgrade</a>
					<a href="{{ route('frontsite.switch-role', ['to_role' => session('user_switch_to_role')]) }}" class="btn btn-green" style="color: #fff;">SWITCH TO {{ strtoupper(session('user_switch_to_role')) }}</a>
				</div>
				<div class="full-width">
					<p>General Information Status</p>
					<div class="progress-holder">
						<span class="center-div">{{$laravelUser->profileInformation->general_info_progress_percentage}}%</span>
						<div id="progressbar">
						</div>
					</div>
				</div>
			</div>
			<div class="bid-holder right-holder" style="background:url('{{asset('/frontsite/images/bid-bg.jpg')}}')no-repeat;">
				<h4>Bids</h4>
				<h2>$7/Bids</h2>
				<a href="{{route('frontsite.professionals.membership')}}" class="trans-btn btn-b-blue">Upgrade</a>
			</div>
			<div class="fund-holder right-holder" style="background:url('{{asset('/frontsite/images/funds-bg.jpg')}}')no-repeat;">
				<h4>My Funds</h4>
				<h2>$ {{$laravelUser->total_earnings}}</h2>
				<a href="{{route('frontsite.professionals.funds.history')}}" class="trans-btn btn-b-white">Fund History</a>
			</div>
		</div>
	</div>
@endsection

@section('js_bottom')
	<script>
		$(function() {
			$( "#progressbar" ).progressbar({
				value: {{$laravelUser->profileInformation->general_info_progress_percentage}}
			});
		});
	</script>
@endsection
