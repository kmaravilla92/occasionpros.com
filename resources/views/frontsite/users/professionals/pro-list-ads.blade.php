@extends('frontsite.users.'.($isPro ? 'professionals.pro' : 'clients.client').'-dashboard-main')

@section('meta-title', 'Professionals Ads')

@section('dashboard-content')
	<div class="content">
		<div class="dash-title clearfix">
			<h3>
				Ads List
				@if($isPro)
					<a href="{{route('frontsite.professionals.ads.create')}}" class="f-right ">Post Ad</a>
				@endif
			</h3>
		</div>
		@include(
			'frontsite.users.partials.ads.list',
			[
				'ads' => $ads,
				'displayPagination' => true,
				'pagination' => $pagination
			]
		)
	</div>
@endsection
