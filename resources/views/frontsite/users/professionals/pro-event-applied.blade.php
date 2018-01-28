@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content">
		<div class="dash-title clearfix">
			<h3>Events Applied <a href="{{route('frontsite.professionals.events')}}" class="f-right">Event Listings</a></h3>
		</div>
		<div class="event-listing">
			<ul>
				<li>
					<div class="content col">

					</div>
					<div class="posted col">
						<h3>Posted</h3>
					</div>
					<div class="budget col">
						<h3>Budget</h3>
					</div>
				</li>
				@forelse($bids as $bid)
                    <?php
                        $event = $bid->event()->first();
                    ?>
					<li>
						<div class="content col">
							<a href="{{route('frontsite.professionals.events.details',[$event['uid']])}}">{{$event['title']}} </a>
							<p>{{$event['description']}}</p>
						</div>
						<div class="posted col">
							<p>Today</p>
							<p>{{date('d/m/Y', strtotime($event['created_at']))}}</p>
						</div>
						<div class="budget col">
							<p>{{$event['budget']}}</p>
						</div>
						<div class="full-content clearfix">
							<div class="f-left">
								<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">{{$event['type']['title']}}</a></p>
								<p> <i class="fa fa-calendar" aria-hidden="true"></i>{{$event['date']}}</p>
								<p> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$event['location']}}</p>
							</div>
							<div class="f-right bids">
								@include(
									'frontsite.users.partials.events.application-status',
									[
										'status' => $bid->status
									]
								)
							</div>
						</div>
					</li>
				@empty
					<li>
						<div class="content col">
							You don't have events applications.
						</div>
					</li>
				@endforelse
			</ul>
			@if(isset($pagination) && count($bids))
		        <div class="clearfix res-pag">
		            {!! $pagination !!}
		        </div>
		    @endif
		</div>
	</div>
@endsection
