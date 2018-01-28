@inject('images','\App\Services\File\Images')

<div class="event-listing pro-listing-detail ad-listing">
    @if(count($ads))
        <ul>
            <li>
                <div class="content col">

                </div>
                <div class="posted col">
                    <h3>Posted</h3>
                </div>
                <div class="budget col">
                    <!-- <h3>Budget</h3> -->
                </div>
            </li>
            @forelse($ads as $ad)
                <li>
                    <div class="content col">
                        <a href="{{route('frontsite.'.($isPro ? 'professionals' : 'clients').'.ads.show',['ad_id'=>$ad['uid']])}}">{{$ad['title']}} </a>
                        <p>{{$ad['content']}}</p>
                    </div>
                    <div class="posted col">
                        <p>Today</p>
                        <p>{{date('m/d/Y', strtotime($ad['created_at']))}}</p>
                    </div>
                    <div class="budget col">
                        
                        <a href="{{route('frontsite.'.($isPro ? 'professionals' : 'clients').'.ads.show',['ad_id'=>$ad['uid']])}}" class="action-btn" title="View ad">
                            <i class="fa fa-eye"></i>
                        </a>
                        @if($isPro)
                            <a href="{{route('frontsite.professionals.ads.edit',['ad_id'=>$ad['uid']])}}" class="action-btn" title="Edit ad">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <!-- @if($ad['is_expired'])
                                <a href="{{route('frontsite.professionals.ads.renew',['ad_id'=>$ad['uid']])}}" class="action-btn" title="Renew ad">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <div style="margin-bottom: 10px;"></div>
                            @endif -->
                            <a href="{{route('frontsite.professionals.ads.renew',['ad_id'=>$ad['uid']])}}" class="action-btn" title="Renew ad">
                                    <i class="fa fa-refresh"></i>
                                </a>
                                <div style="margin-bottom: 10px;" class="ads-delete-next-line"></div>
                            <form action="{{route('frontsite.professionals.ads.destroy',['ad_id'=>$ad['uid']])}}" method="POST" class="inline ajaxify" title="Delete ad">
                                {{method_field('DELETE')}}
                                <button class="action-btn danger"><i class="fa fa-trash"></i></button>
                            </form>
                        @endif
                    </div>
                    @if($isPro)
                        <div class="full-content clearfix">
                            <div class="f-left">
                                <p><i class="fa fa-calendar" aria-hidden="true"></i>Expire{{$ad['is_expired'] ? 'd' : 's'}} At: {{date('M d, Y H:i:s A', strtotime($ad['expired_at']))}}</p>
                                <p> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$ad['location']}}</p>
                            </div>
                            <div class="f-right">
                                <p>
                                    Status
                                    <br>
                                    @if($ad['is_expired'])
                                        <span style="color:#a93f30;">Expired</span>
                                    @else
                                        @if($ad['status'] == '0')
                                            <span style="color:#e5a037;">Waiting for approval</span>
                                        @elseif($ad['status'] == '3')
                                            <span style="color:#a93f30;">Waiting for payment</span>
                                        @elseif($ad['status'] == '1')
                                            <span style="color:#32871c;">Active</span>
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endif
                </li>
            @empty   
                <li>
                    <p>No available pros ads.</p>
                </li> 
            @endforelse
        </ul>
    @else
        <div class="no-items">
            <div class="title-holder">
                <h3>
                    <!-- <span>404</span> -->
                    Oops! No available ads.
                </h3>
                <hr>
                <br>
                <!-- <a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a> -->
            </div>
        </div>
    @endif
    @if(isset($displayPagination) && count($ads))
        <div class="clearfix res-pag">
            {!! $pagination !!}
        </div>
    @endif
</div>
