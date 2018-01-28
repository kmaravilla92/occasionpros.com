@extends('frontsite.layouts.main')

@section('content')
<section id="main-wrapper" class="client-dashboard pro-dashboard pro-mship">
	<div class="banner-holder" style="background:url('{{asset('/frontsite/images/pro-db.jpg')}}')">

		<div class="title-holder white-text">
			<h3>
				<span>PRO</span>
				DASHBOARD
			</h3>
			<hr>
		</div>
	</div>
	<div class=" dashboard-section section">
		<div class="wrapper">
			@if(!Request::is('*/membership*'))
				<center>
					<div class="c-hamburger c-hamburger--htx dash-nav" id="side-menus">
						<span></span>
						<p>Dashboard</p>
					</div>
				</center>
				<div class="navigation">
					<ul>
						<li class="{{Request::is('professionals/dashboard') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.dashboard')}}">Dashboard</a>
						</li>
						<li class="{{Request::is('professionals/general-information*') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.general-information')}}">General Information</a>
						</li>
						<li class="{{Request::is('professionals/*profile*') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.my-profile')}}">Profile</a>
						</li>
						<li class="{{Request::is('professionals/membership') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.membership')}}">Membership</a>
						</li>
						<li class="{{!Request::is('professionals/events/history') && Request::is('professionals/*events*') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.events')}}">List of Events</a>
						</li>
						<li class="{{Request::is('professionals/funds/history') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.funds.history')}}">Fund History</a>
						</li>
						<li class="{{Request::is('professionals/events/history') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.events.history')}}">Event History</a>
						</li>
						<li class="{{Request::is('professionals/ads*') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.ads')}}">My Ad Posts</a>
						</li>
						<li class="{{Request::is('professionals/reviews') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.reviews')}}">Rating & Testimonials</a>
						</li>
						<li class="{{Request::is('notifications') ? 'active' : ''}}">
							<a href="{{route('frontsite.notifications')}}">My Notifications <span class="notifications-count">{{$laravelUser->unreadNotifications->count()}}</span></a>
						</li>
						<li class="{{Request::is('professionals/notifications') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.notifications')}}">Notification Settings</a>
						</li>
						<li class="{{Request::is('professionals/account-information') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.account-information')}}">Account Info</a>
						</li>
						<!-- <li class="{{Request::is('professionals/payment-information') ? 'active' : ''}}">
							<a href="{{route('frontsite.professionals.payment-information')}}">Payment Info</a>
						</li> -->
					</ul>
				</div>
			@endif
			@yield('dashboard-content')
		</div>
	</div>
</section>
@endsection
