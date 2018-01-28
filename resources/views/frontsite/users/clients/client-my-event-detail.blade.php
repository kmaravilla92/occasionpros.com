@inject('images','\App\Services\File\Images')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Event')

@section('dashboard-content')
	<div class="content my-event-detail">
		<div class="dash-title">
			<h3>My Event Detail  <a href="{{route('frontsite.clients.events')}}" class="f-right ">Event Listing</a></h3>
		</div>
        @include('frontsite.users.clients.partials.events.verification-notice', [
            'status' => $event['status']
        ])
		<div class="event-listing event-detail">
			<div class="posted col">
				<p>Posted at {{date('m/d/Y', strtotime($event['created_at']))}}</p>
			</div>
			<div class="content col">
				<a>{{$event['title']}}</a>
				<p>
					{{$event['description']}}
				</p>
			</div>
			<div class="full-content clearfix">
				<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">{{$event['type']['title']}}</a></p>
				<p> <i class="fa fa-calendar" aria-hidden="true"></i>{{$event['date']}}</p>
				<p> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$event['location']}}</p>
			</div>
			<div class="budget fl">
				<p>Budget: {{$event['budget']}}</p>
			</div>
            @if(isset($winningBid))
                <div class="fr" style="padding: 20px 0 0;">
                    @if($winningBid['status'] == '1')
                        {!!
                            Form::open([
                                'url' => route('frontsite.clients.events.mark-as-complete'),
                                'class' => 'ajaxify',
                                'style' => 'display:inline-block;'
                            ])
                        !!}
                        <input type="hidden" name="winning_bid" value="{{$winningBid['id']}}">
                        <input type="submit" class="btn-green mark-as-complete" value="MARK AS COMPLETE" data-orig-text="MARK AS COMPLETE"/>
                        {!!
                            Form::close()
                        !!}
                    @elseif(in_array($winningBid['status'], ['2','4']))
                        <a style="cursor:default;" class="btn-green">COMPLETED</a>
                    @endif
					
                    @if($winningBid['status'] == '4')
                        <a style="cursor:default;" class="btn-green">PAYMENT SENT</a>
                    @else
                        <a href="{{route('frontsite.clients.payment-info',['bid_id'=>$winningBid['id']])}}" class="btn-green">SEND PAYMENT</a>
                    @endif
                </div>
            @endif
            <div class="clearfix"></div>
			<div class="bid-listing">
				<div class="head">
					<p>Received Bids <span style="color:#32871c;">( {{count($bids)}}{{--/7--}} )</span></p>
					<hr>
					<p>SEE ALL <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
				</div>
				@forelse($bids as $bid)
                    <div class="bid-holder">
                        <div class="left-content">
                            <div class="bid-img">
                                <div class="img-holder">
                                    <img src="{{$images->getImage('users/'.$bid['bidder']['id'].'/profile_115x115.jpg')}}" class="center-div" alt="">
                                </div>
                                <a href="{{route('frontsite.professionals.profile', [$bid['bidder']['id']])}}" target="_blank">View Profile</a>
                            </div>
                            <div class="bid-content">
                                <a href="{{route('frontsite.professionals.profile', [$bid['bidder']['id']])}}">{{$bid['bidder']['name']}}</a>
                                <p>Stand-Up Comedian / Actor</p>
                                <p>{{$bid['bidder']['profile_information']['location']}},</p>
                                <p>	
                                    <?php 
                                        \Cache::forget(sprintf(
                                            'event_single_view_distance_calculation?event_id=%s&viewer_id=%s',
                                            $event['id'],
                                            $currentUser->id
                                        ));
                                        $distance = \Cache::remember(
                                            sprintf(
                                                'event_single_view_distance_calculation?event_id=%s&viewer_id=%s',
                                                $event['id'],
                                                $currentUser->id
                                            ), 
                                            env('CACHE_EXPIRATION'), 
                                            function() use($bid, $event)
                                            {
                                                return calculate_distance(
                                                    $bid['bidder']['profile_information']['latitude'],
                                                    $bid['bidder']['profile_information']['longitude'],
                                                    $event['latitude'],
                                                    $event['longitude'],
                                                    'M'
                                                );
                                            });

                                        echo $distance > 0 ? sprintf('%s miles from location', $distance) : '<b><i>Distance cannot be computed.</i></b>';
                                    ?>
                                </p>
								@if(isset($winningBid))
                                    @if($winningBid['id'] === $bid['id'])
                                        <div class="details write-review">
                                            <p style="margin: 5px 0;">Sucessfully Ended</p>
                                            @if(!isset($event['selected_pro']['testimonial_id']))
                                                <a href="{{route('frontsite.clients.reviews.create',['event_id'=>$event['id'],'professional_id'=>$event['selected_pro']['user_id']])}}" class="btn-yellow"><i class="fa fa-star" aria-hidden="true"></i> Write a Review</a>
                                            @else
                                                <a href="#" class="btn-yellow"><i class="fa fa-star" aria-hidden="true"></i> View Review</a>
                                            @endif
                                        </div>
                                    @endif
                                @else
                                    {!!
                                        Form::open([
                                            'url'       => route('frontsite.clients.events.connect-with-pro',[$bid['id']]),
                                            'method'    => 'GET',
                                            'class'     => 'ajaxify'
                                        ])
                                    !!}
                                        <button class="btn-green connect-with-pro" data-orig-text="HIRE PRO">HIRE PRO</button>
                                    {!!
                                        Form::close()
                                    !!}
								@endif
                            </div>
                        </div>
                        <div class="bid-details">
                            <p>
                                {{$bid['details']}}
                            </p>
                        </div>
                    </div>
                @empty
                    <p>
                        No available bids
                    </p>
                @endforelse
			</div>
			</div>
		</div>
		</div>
	</div>
@endsection

@section('js_bottom')
    @parent
    <script>
        $(function(){
            $('.connect-with-pro').on('click', function(){
                $(this).parent('form').submit();
                return false;
            });
        });
    </script>
@endsection
