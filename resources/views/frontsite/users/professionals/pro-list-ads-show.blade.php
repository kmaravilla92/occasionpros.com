@inject('images', '\App\Services\File\Images')

@extends('frontsite.users.'.($isPro ? 'professionals.pro' : 'clients.client').'-dashboard-main')

@section('meta-title', 'Professionals Ads')

@section('dashboard-content')
	<div class="content my-event-detail ad-detail event-listing">
		<div class="dash-title clearfix">
			<h3>Ad Details  <a href="{{route('frontsite.'.($isPro ? 'professionals' : 'clients').'.ads')}}" class="f-right ">Ads Listing</a></h3>
		</div>
		<div class="event-listing event-detail">
			<div class="posted col">
				<p>Posted At {{date('m/d/Y', strtotime($ad['created_at']))}}</p>
			</div>
			<div class="f-right pro-ads-show-action-btns">
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
		            <form action="{{route('frontsite.professionals.ads.destroy',['ad_id'=>$ad['uid']])}}" method="POST" class="inline ajaxify" title="Delete ad">
		                {{method_field('DELETE')}}
		                <button class="action-btn danger"><i class="fa fa-trash"></i></button>
		            </form>
		        @endif
			</div>
			<div class="f-left pro-ads-show-details">
				<div class="content col">
					<a >{{$ad['title']}}</a>
					<p>{{$ad['content']}}</p>
				</div>
			</div>
			<div class="clearfix"></div>
			@if($isPro)
				<div class="full-content clearfix">
					<div class="f-left">
						<p><i class="fa fa-calendar" aria-hidden="true"></i>Expire{{$ad['is_expired'] ? 'd' : 's'}} At: {{date('M d, Y H:i:s A', strtotime($ad['expired_at']))}}</p>
	                	<p> <i class="fa fa-map-marker" aria-hidden="true"></i>{{$ad['location']}}</p>
					</div>
	                <div class="f-right">
	                    <p class="ad-status">
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
		</div>
	</div>
</div>
@endsection
