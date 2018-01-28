@extends('frontsite.layouts.main')

@section('content')
	<section id="main-wrapper" class="client-dashboard">
		<div class="banner-holder" style="background:url('{{asset('/frontsite/images/client-banner.jpg')}}')">
			<div class="title-holder white-text">
				<h3>
					<span>CLIENT</span>
					DASHBOARD
				</h3>
				<hr>
			</div>
		</div>
		<div class="dashboard-section section">
			<div class="wrapper">
				<center>
					<div class="c-hamburger c-hamburger--htx dash-nav" id="side-menus">
				        <span></span>
				    	<p>Dashboard</p>
				    </div>
				</center>
				<div class="navigation">
					<ul>
						<li class="{{Request::is('clients/dashboard') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.dashboard')}}">Dashboard</a>
						</li>
						<li class="{{Request::is('clients/my-profile') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.my-profile')}}">My Profile</a>
						</li>
						<li class="{{Request::is('clients/events*') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.events')}}">My Events</a>
						</li>
						<li class="{{Request::is('clients/ads*') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.ads')}}">Pros Ads</a>
						</li>
						<li class="{{Request::is('notifications*') ? 'active' : ''}}">
							<a href="{{route('frontsite.notifications')}}">My Notifications <span class="notifications-count">{{$laravelUser->unreadNotifications->count()}}</span></a>
						</li>
						<li class="{{Request::is('clients/reviews*') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.reviews')}}">Rating and Testimonials</a>
						</li>
						<li class="{{Request::is('clients/account-info') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.account-info')}}">Account Info</a>
						</li>
						<!-- <li class="{{Request::is('clients/payment-info') ? 'active' : ''}}">
							<a href="{{route('frontsite.clients.payment-info')}}">Payment Info</a>
						</li> -->
					</ul>
				</div>
				@yield('dashboard-content')
			</div>
		</div>
	</section>
@endsection
