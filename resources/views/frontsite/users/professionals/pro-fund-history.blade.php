@inject('images','\App\Services\File\Images')

@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content my-event-detail my-event pro-funds">
		<div class="dash-title clearfix">
			<h3>Fund History</h3>
		</div>
		<div class="event-listing pro-listing-detail">
			@if(count($funds))
				<ul>
					<li>
						<div class="content col">
						</div>
						<div class="posted col">
							<h3>Date</h3>
						</div>
						<div class="budget col">
							<h3>Amount</h3>
						</div>
						<div class="status col">
							<h3>Status</h3>
						</div>
					</li>
					@forelse($funds as $fund)
	                    <?php
	                        $event = $fund['event'];
	                        $event_owner = $event['owner'];
	                    ?>
						<li>
							<div class="content col">
								<div class="img-holder">
									<img src="{{$images->getImage('users/'.$event_owner['id'].'/dashboard_listing_45x45.jpg')}}" alt="">
								</div>
								<div class="text-holder">
									<a href="#" style="display: inline;">
	                                    {{$event_owner['first_name']}}’s
	                                    <span style="color:#000;">Event </span>
									</a>
									<a href="{{route('frontsite.professionals.events.details',['event_id'=>$fund['event_id']])}}" style="display: inline;">
	                                    {{$event['title']}}
	                                </a>

								</div>
							</div>
							<div class="posted col">

								<p>{{date('m/d/Y', strtotime($fund['created_at']))}}</p>
							</div>
							<div class="budget col">
								<p>${{$fund['feed_amount']}}</p>
							</div>
	                        @if($fund['status'] == '0')
	                            <div class="status col">
	                                {!!
	                                    Form::open([
	                                        'url'   => route('frontsite.professionals.funds.request-transfer',[$fund['id']]),
	                                        'class' => 'ajaxify'
	                                    ])
	                                !!}
	                                    <button class="trans-btn btn-b-blue" data-orig-text="Request Fund Transfer">Request Fund Transfer</button>
	                                {!!
	                                    Form::close()
	                                !!}
	                            </div>
	                        @elseif($fund['status'] == '1')
	                            <div class="status col">
	                                <p class="pending">Pending</p>
	                            </div>
	                        @elseif($fund['status'] == '2')
	                            <div class="status col">
	                                <p class="transferred">Transferred <i class="fa fa-check" aria-hidden="true"></i></p>
	                            </div>
	                        @endif
							<div class="full-content clearfix"></div>
						</li>
					@empty

					@endforelse
				</ul>
			@else
				<div class="no-items">
		            <div class="title-holder">
		                <h3>
		                    <!-- <span>404</span> -->
		                    Oops! No available funds.
		                </h3>
		                <hr>
		                <br>
		                <!-- <a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a> -->
		            </div>
		        </div>
			@endif
			@if(isset($pagination) && count($funds))
		        <div class="clearfix res-pag">
		            {!! $pagination !!}
		        </div>
		    @endif
		</div>
	</div>
@endsection
