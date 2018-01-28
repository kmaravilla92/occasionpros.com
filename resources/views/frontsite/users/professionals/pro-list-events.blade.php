@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'OP Events')

@section('dashboard-content')
	<div class="content">
		<div class="dash-title clearfix">
			<h3>Events List <a href="{{route('frontsite.professionals.events.applied')}}" class="f-right">Events Applied</a></h3>
		</div>
		@include(
			'frontsite.users.partials.events.list',
			[
				'events' => $events,
				'displayPagination' => true,
				'pagination' => $pagination
			]
		)
	</div>
@endsection
