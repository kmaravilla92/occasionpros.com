@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Reviews')

@section('dashboard-content')
	<div class="content my-event-detail my-event pro-events pro-events-history">
		<div class="dash-title clearfix">
			<h3>Ratings & Testimonials</h3>
		</div>
		<div class="event-listing pro-listing-detail pro-rating-testi">
			@include(
				'frontsite.users.professionals.components.testimonials-listing',
				[
					'reviews' => $recentReviews,
					'paginate' => true
				]
			)
		</div>
	</div>
@endsection