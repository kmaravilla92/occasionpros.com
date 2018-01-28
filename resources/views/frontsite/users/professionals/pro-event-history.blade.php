@inject('images','\App\Services\File\Images')

@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content my-event-detail pro-events-history">
		<div class="dash-title">
			<h3>Event History</h3>
		</div>
		<div class="event-listing pro-listing-detail">
			@if(count($bids))
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
	                        $owner = $event->owner()->first();
	                        $ownerInfo = $owner->profileInformation()->first();
	                        $selectedPro = $event->selectedPro()->first();
	                        $testimonial = null;
	                        if($selectedPro){
	                        	$testimonial = $selectedPro->testimonial()->first();
	                        }
	                    ?>
						<li>
							<div class="content col">
								<div class="img-holder">
									<img src="{{$images->getImage('users/'.$event->created_by.'/dashboard_listing_45x45.jpg')}}" alt="">
								</div>
								<div class="text-holder">
									<a href="{{route('frontsite.professionals.events.details',[$event['uid']])}}">{{$event['title']}} </a>
									@if($bid->status == 2)
										@if(is_null($selectedPro) || is_null($testimonial))
											<div class="write-review">
												<p>OVERALL
													<span>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</span>
													- Email Client to review your performance
												</p>
											</div>
										@else
											<div class="full-content review">
												<div class="review-holder">
													<span>{{$testimonial->rating_float}}</span>
													<label>OVERALL </label>
													<div class="rating">
														@include('frontsite.partials.ratings',['rating'=>$testimonial->rating])
													</div>
													<p>Reviewed by {{$owner['first_name']}} {{$owner['last_name'][0]}}, {{$ownerInfo->location}} {{date('d/m/Y', strtotime($testimonial->created_at))}}</p>
													<p>“{{$testimonial->feedback}}”</p>
												</div>
											</div>
										@endif
									@endif
								</div>
							</div>
							<div class="posted col">
								<p>Today</p>
								<p>{{date('d/m/Y', strtotime($event['created_at']))}}</p>
							</div>
							<div class="budget col">
								<p>{{$event['budget']}}</p>
							</div>
							<div class="full-content clearfix">
								@if($bid->status == 2)
									@if(is_null($selectedPro) || is_null($testimonial))
										<div class="btn-e-b clearfix">
											<a href="mailto:{{$owner->email}}" class="trans-btn btn-b-blue f-left"> <i class="fa fa-envelope" aria-hidden="true"></i> <span>{{$owner->full_name}}</span> {{$owner->email}}</a>
										</div>
									@endif
								@endif
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
								You don't have events history.
							</div>
						</li>
					@endforelse
					<!-- <li>
						<div class="content col">
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/pro-client1.jpg')}}" alt="">
							</div>
							<div class="text-holder">
								<a>Accusata complectitur at duo </a>
								<div class="write-review">
									<p>OVERALL
										<span>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</span>
										- Email Client to review your performance
									</p>
								</div>
							</div>
						</div>
						<div class="posted col">
							<p>Today</p>
							<p>10/26/2016</p>
						</div>
						<div class="budget col">
							<p>$100.00</p>
						</div>
						<div class="full-content clearfix">
							<div class="btn-e-b clearfix">
								<a href="mailto:name@gmail.com" class="trans-btn btn-b-blue f-left"> <i class="fa fa-envelope" aria-hidden="true"></i> <span>Client</span> name@email.com</a>
							</div>
							<div class="f-left">
								<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">Type Name</a></p>
								<p> <i class="fa fa-calendar" aria-hidden="true"></i>10/30/2016 6:00PM -12:00 PM</p>
								<p> <i class="fa fa-map-marker" aria-hidden="true"></i>Los Angeles, CA</p>
							</div>
							<div class="f-right budg">
								<p>Application status
									<br>
									<span style="color:#e5a637;">Event Successfully Ended</span>
								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="content col">
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/pro-client1.jpg')}}" alt="">
							</div>
							<div class="text-holder">
								<a>Accusata complectitur at duo </a>
								<div class="full-content review">
									<div class="review-holder">
										<span>5.0</span>
										<label>OVERALL </label>
										<div class="rating">
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</div>
										<p>Reviewed by Alexa S., LA 10/2/2016</p>
										<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ”</p>
									</div>
								</div>
							</div>
						</div>
						<div class="posted col">
							<p>Today</p>
							<p>10/26/2016</p>
						</div>
						<div class="budget col">
							<p>$100.00</p>
						</div>
						<div class="full-content clearfix">
							<div class="f-left">
								<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">Type Name</a></p>
								<p> <i class="fa fa-calendar" aria-hidden="true"></i>10/30/2016 6:00PM -12:00 PM</p>
								<p> <i class="fa fa-map-marker" aria-hidden="true"></i>Los Angeles, CA</p>
							</div>
							<div class="f-right budg">

								<p>Application status
									<br>
									<span style="color:#e5a637;">Event Successfully Ended</span>
								</p>
							</div>
						</div>
					</li> -->
				</ul>
			@else
				<div class="no-items">
		            <div class="title-holder">
		                <h3>
		                    <!-- <span>404</span> -->
		                    Oops! No available events.
		                </h3>
		                <hr>
		                <br>
		                <!-- <a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a> -->
		            </div>
		        </div>
			@endif
			@if(isset($pagination) && count($bids))
		        <div class="clearfix res-pag">
		            {!! $pagination !!}
		        </div>
		    @endif
		</div>
	</div>
@endsection
