@inject('images','\App\Services\File\Images')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Dashboard')

@section('dashboard-content')
	
	<div class="content">
		<div class="dash-title">
			<h3>DASHBOARD</h3>
		</div>
		<div class="col my-recent-events left-col" style="background:url('{{asset('/frontsite/images/recentevents.jpg')}}')">
			<div class="title clearfix">
				<h3 class="f-left">My Recent Events</h3>
				<a href="{{route('frontsite.clients.events')}}" class="f-right">See all</a>
			</div>
			<ul class="listing">
				@forelse($recentEvents as $event)
					<li class="ease">
						<a href="{{route('frontsite.clients.events.show',[$event['uid']])}}">
							<h3><span>My Event</span> {{$event['title']}} </h3>
							<p>Type:  {{$event['type']['title']}}</p>
							<p>Date: {{$event['date']}}</p>
							<p>Budget: {{$event['budget']}}</p>
						</a>
					</li>
				@empty
					<li>
						<p>No available events.</p>
					</li>
				@endforelse
			</ul>
		</div>
		<div class="col right-col">
			<div class="user-profile">
				<div class="img-holder">
					<img class="center-div" src="{{$images->getImage('users/'.$currentUser->id.'/profile_115x115.jpg')}}" alt="">
				</div>
				<h3>Welcome back</h3>
				<h4>
					{{$currentUser->first_name}} {{$currentUser->last_name}}
					@if(isset($user['profile_information']['location']))
						<br> {{$user['profile_information']['location']}}
					@endif
				</h4>
				<a href="{{ route('frontsite.switch-role', ['to_role' => session('user_switch_to_role')]) }}" class="btn btn-green btn-switch" style="color: #fff;">SWITCH TO {{ strtoupper(session('user_switch_to_role')) }}</a>
			</div>
			<div class="new-event" style="background:url('{{asset('/frontsite/images/new-event.jpg')}}');">
				<h3>
					<span>START OFF WITH A</span>
					NEW EVENT
				</h3>
				<div class="form-holder">
					{!!
						Form::open([
							'url'		=>	route('frontsite.clients.search.professionals'),
							'method'	=>	'GET',
							'target'	=>	'_blank'
						])
					!!}
						<ul>
							<li>
								<label for="">I’m looking for a</label>
								{!!
									Form::select(
										'category',
										$pro_categories,
										null,
										[
											'id' 			=> 	'category',
											'placeholder' 	=> 	'-- Select --',
											'class' 		=>	'select2autosuggest' 
										]
									)
								!!}
							</li>
							<li>
								{!!
									Form::text(
										'location',
										null,
										[
											'id'			=>	'location',
											'placeholder' 	=> 	'City, State or Zip Code'
										]
									)
								!!}
								<input type="hidden" name="latitude" id="location_lat" value="">
	                            <input type="hidden" name="longitude" id="location_lng" value="">
							</li>
						</ul>
						<input type="submit" name="" class="trans-btn btn-yellow" value="SUBMIT" >
					</form>
				</div>

			</div>
		</div>
	</div>
@endsection