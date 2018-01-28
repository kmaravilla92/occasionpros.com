@inject('images','\App\Services\File\Images')

<div class="event-listing pro-listing-detail">
    @if(count($events))
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
            @foreach($events as $event)
                <li>
                    <div class="content col">
                        @if(isset($hasOwnerPic))
                            <div class="img-holder">
                                <img src="{{$images->getImage('users/'.$event['owner']['id'].'/dashboard_listing_45x45.jpg')}}" alt="">
                            </div>
                        @endif
                        @if(isset($hasOwnerPic))
                            <div class="text-holder">
                        @endif
                            <a href="{{route('frontsite.professionals.events.details',['event_id'=>$event['uid']])}}">{{$event['title']}} </a>
                            <p>{{$event['description']}}</p>
                        @if(isset($hasOwnerPic))
                            </div>
                        @endif
                    </div>
                    <div class="posted col">
                        <p>Today</p>
                        <p>{{date('m/d/Y', strtotime($event['created_at']))}}</p>
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
                        @if(isset($event['bids']))
                            <div class="f-right bids">
                                @if(0 === count($event['bids']))
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
                                        <a href="#open-event-bid-{{$event['id']}}" class="trans-btn btn-green popup-with-zoom-anim">BID</a>
                                        @include(
                                            'frontsite.partials.popups.event-bid',
                                            [
                                                'event' => $event
                                            ]
                                        )
                                    @endif
                                @else
                                    @include(
                                        'frontsite.users.partials.events.application-status',
                                        [
                                            'status' => $event['bids'][0]['status']
                                        ]
                                    )
                                @endif
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach
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
    @if(isset($displayPagination) && count($events))
        <div class="clearfix res-pag">
            {!! $pagination !!}
        </div>
    @endif
</div>
