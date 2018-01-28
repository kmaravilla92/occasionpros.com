@inject('images','\App\Services\File\Images')
<div class="event-listing pro-listing-detail pro-rating-testi">
    @if(count($reviews))
        <ul>
            <li></li>
            @forelse($reviews as $review)
                <li>
                    <div class="content col full-width">
                        <div class="img-holder">
                            <img src="{{$images->getImage('users/'.$review['event']['owner']['id'].'/dashboard_listing_45x45.jpg')}}" alt="">
                        </div>
                        <div class="text-holder ">
                            <a href="#" style="display: inline;">{{$review['event']['owner']['first_name']}}</a>
                            <a href="#" style="display: inline;">’s <span style="color:#000000;">Event</span></a>
                            <a href="{{route('frontsite.professionals.events.details',['event_id'=>$review['event']['uid']])}}" style="display: inline;">{{$review['event']['title']}} </a>
                            <div class="full-content review">
                                <div class="review-holder">
                                    <span>{{$review['rating_float']}}</span>
                                    <label>OVERALL </label>
                                    <div class="rating">
                                        @include(
                                            'frontsite.partials.ratings',
                                            [
                                                'rating' => $review['rating']
                                            ]
                                        )
                                    </div>
                                    <label for="" style="color:#000000; font-size:14px;">{{$review['event']['budget']}}</label>
                                    <p>
                                        Reviewed by
                                        {{$review['event']['owner']['name']}},
                                        {{$review['event']['owner']['profile_information']['location']}}
                                        on {{date('m/d/Y', strtotime($review['created_at']))}}
                                    </p>
                                    <p>“{{$review['feedback']}}”</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="full-content clearfix">
                        <div class="f-left">
                            <p> <i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">{{$review['event']['type']['title']}}</a></p>
                            <p> <i class="fa fa-calendar" aria-hidden="true"></i>{{$review['event']['date']}}</p>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                {{$review['event']['location']}}
                            </p>
                        </div>
                        <div class="f-right budg">
                        </div>
                    </div>
                </li>
            @empty
                <li>
                    <p>No available reviews.</p>
                </li>
            @endforelse
        </ul>
    @else
        <div class="no-items">
            <div class="title-holder">
                <h3>
                    <!-- <span>404</span> -->
                    Oops! No available reviews.
                </h3>
                <hr>
                <br>
                <!-- <a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a> -->
            </div>
        </div>
    @endif
    @if(isset($pagination) && count($reviews))
        <div class="clearfix res-pag">
            {!! $pagination !!}
        </div>
    @endif
</div>
