@inject('images','\App\Services\File\Images')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Events')

@section('dashboard-content')
<div class="content my-event">
	<div class="dash-title">
		<h3>
			My Events
			<a href="{{route('frontsite.events.create')}}" class="f-right">Post Event</a>
		</h3>
	</div>
	<div class="event-listing">
		@if(count($myEvents))	
			<ul class="datatables">
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
	            @forelse($myEvents as $event)
					<?php
						$selectedPro = $event['selected_pro'];
					?>
	                <li>
	                	@include('frontsite.users.clients.partials.events.verification-notice', [
				            'status' => $event['status']
				        ])
	                    <div class="content col">
	                        <a href="{{route('frontsite.clients.events.show', [$event['uid']])}}">{{$event['title']}} </a>
	                        <p>
	                            {{$event['description']}}
	                        </p>
	                    </div>
	                    <div class="posted col">
	                        <p>Today</p>
	                        <p>{{$event['created_at']}}</p>
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
							@if(isset($event['selected_pro']) && in_array($event['selected_pro']['status'],['1','2',]))
								<div class="f-right write-review">
									<div class="img-holder">
										<img src="{{$images->getImage('users/'.$event['selected_pro']['user_id'].'/dashboard_listing_45x45.jpg')}}" alt="">
									</div>
									<div class="details">
										<p>Sucessfully Ended</p>
										@if(!isset($event['selected_pro']['testimonial_id']))
											<a href="{{route('frontsite.clients.reviews.create',['event_id'=>$event['id'],'professional_id'=>$event['selected_pro']['user_id']])}}" class="btn-yellow"><i class="fa fa-star" aria-hidden="true"></i> Write a Review</a>
										@else
											<a href="#" class="btn-yellow"><i class="fa fa-star" aria-hidden="true"></i> View Review</a>
										@endif
									</div>
								</div>
							@elseif($event['selected_pro']['status'] == '0')
								<div class="f-right bids">
									<p>Event Status<br><span style="color:#e59e33;"><i class="fa fa-exclamation" aria-hidden="true" style="color:#e59e33;"></i>Event in Progress</span></p>
								</div>
							@endif
							@if(!isset($event['selected_pro']))
								<div class="f-right bids">
									<p>Pro Selection Status<br><span style="color:#a93f30;"><i class="fa fa-times" aria-hidden="true" style="color:#a93f30;"></i>No Selected Pro</span></p>
								</div>
							@endif
	                    </div>
	                </li>
	            @empty
					<!-- <li>
						<div class="content col">
							You don't have events.
						</div>
					</li> -->
	            @endforelse
			</ul>
		@else
			<div class="no-items">
				<div class="title-holder">
					<h3>
						<!-- <span>404</span> -->
						Oops! You have no events.
					</h3>
					<hr>
					<br>
					<a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a>
				</div>
			</div>
		@endif
		@if(isset($pagination) && count($myEvents))
	        <div class="clearfix res-pag">
	            {!! $pagination !!}
	        </div>
	    @endif
	</div>
</div>
@endsection
