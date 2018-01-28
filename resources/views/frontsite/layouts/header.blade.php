<header class="clearfix">
	<div class="wrapper">
		<div class="logo-holder f-left">
			<a href="{{route('frontsite.home')}}"><img src="{{asset('/frontsite/images/logo.png')}}" alt=""></a>
		</div>
		<div class="nav-link" id="sub-nav">
			
			<div class="clearfix mobileme">
				<a href="javascript:$.pageslide.close()" class="c-hamburger close c-hamburger--htx is-active f-right" id="top-menus">
			    	<span>toggle menu</span>
			    </a>
			</div>
			@if(isset($currentUser)) <!-- Must check for User Session -->
			<nav class="login-link home mobileme">
				@if($currentUser->hasAccess('professional'))
					<a href="#" class="amount">USD $ {{$laravelUser->total_earnings}}</a>
				@endif
				<div class="user-holder" style="cursor:pointer;">		
				
					{!! \App\Components\NotificationsPopup::render() !!}
				
					<div class="drop user-access" style="position: relative;">
								
						<p>{!! @trans('messages.greet', ['name' => $currentUser->first_name]) !!} <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
				
						<div class="register-drop drop-menu">
				
							<div class="pop-arrow">
				
								<img src="{{asset('/frontsite/images/arrow-up.png')}}" alt="">
				
							</div>
				
							@if(isset($currentUser))
								@if($currentUser->hasAnyAccess('professional'))
									<a href="{{route('frontsite.professionals.dashboard')}}" class="btn-default">Dashboard</a>
									<a href="{{route('frontsite.professionals.general-information')}}" class="btn-default">General Information</a>
									<a href="{{route('frontsite.professionals.my-profile')}}" class="btn-default">Profile</a>
									<a href="{{route('frontsite.professionals.events')}}" class="btn-default">List of Events</a>
									<a href="{{route('frontsite.professionals.funds.history')}}" class="btn-default">Fund History</a>
									<a href="{{route('frontsite.professionals.events.history')}}" class="btn-default">Event History</a>
									<a href="{{route('frontsite.professionals.membership')}}" class="btn-default">Membership</a>
									<a href="{{route('frontsite.professionals.reviews')}}" class="btn-default">Rating & Testimonials</a>
									<a href="{{route('frontsite.professionals.notifications')}}" class="btn-default">Notification</a>
									<a href="{{route('frontsite.professionals.account-information')}}" class="btn-default">Account Info</a>
								@else
									<a href="{{route('frontsite.clients.dashboard')}}" class="btn-default">Dashboard</a>
									<a href="{{route('frontsite.clients.my-profile')}}" class="btn-default">My Profile</a>
									<a href="{{route('frontsite.clients.events')}}" class="btn-default">My Events</a>
									<a href="{{route('frontsite.clients.reviews')}}" class="btn-default">Rating & Testimonials</a>
									<a href="{{route('frontsite.clients.account-info')}}" class="btn-default">Account Info</a>
									<!-- <a href="#" class="btn-default">Payment Info</a> -->
								@endif	
								<a href="{{ route('frontsite.switch-role', ['to_role' => session('user_switch_to_role')]) }}" class="btn-default">SWITCH TO {{ strtoupper(session('user_switch_to_role')) }}</a>
								<a href="{{route('admin.logout')}}" class="btn-default">Log Out</a>
							@endif
				
						</div>
				
					</div>
				
				</div>
			</nav>
			@else
		    <nav class="login-link home mobileme">
				<a class="log-in popup-with-zoom-anim" href="#open-login" onclick="location.href='javascript:$.pageslide.close()'">LOGIN</a>
				<!-- <a href="#" id="btn-register-trigv2"> -->
				<a href="{{ route('frontsite.sign-up') }}">
					REGISTER 
					<!-- <i class="fa fa-sort-desc" aria-hidden="true"></i> -->
					<!-- <div class="register-drop">
						<div class="pop-arrow">
							<img src="{{asset('/frontsite/images/arrow-up.png')}}" alt="">
						</div>
						<label for="">Register as Client</label>
						<button type="submit" onclick="window.location='{{route('frontsite.clients.sign-up')}}'">Client <span class="client">Sign up</span></button>
						<div class="or-separate">
							<hr>
							<span>OR</span>
						</div>
						<label for="">Register as Professionals</label>
						<button type="submit" class="btn-default" onclick="window.location='{{route('frontsite.professionals.sign-up')}}'">Pro <span class="prof">Sign-up</span></button>
					</div> -->
				</a>
				<a href="" style="display: none;"></a>
			</nav>
			@endif
			<nav class="nav-link f-left">			
			    
				@if(Request::path()=='/')	
			
					<a href="{{route('frontsite.how-it-works')}}">HOW IT WORKS</a>
			
					<a href="{{route('frontsite.about-us')}}">ABOUT US</a>
			
					<a href="{{route('frontsite.contact-us')}}">CONTACT US</a>
			
					<a href="{{route('frontsite.blog-posts')}}">BLOG</a>
			
				@else
			
					<a href="{{route('frontsite.events.create')}}">POST YOUR EVENT</a>
			
					<a href="{{route('frontsite.clients.search.options')}}">FIND TALENT</a>
			
					<a href="{{route('frontsite.about-us')}}">ABOUT US</a>
			
					<a href="{{route('frontsite.contact-us')}}">CONTACT US</a>
			
					<a href="{{route('frontsite.blog-posts')}}">BLOG</a>
			
				@endif
			
			</nav>
		</div>
		<a href="#sub-nav" class="c-hamburger home c-hamburger--htx f-right open" id="top-menus">
	    	<span>toggle menu</span>
	    </a>
		@if(isset($currentUser)) <!-- Must check for User Session -->
		<!-- <nav class="login-link home f-right"> -->
			<div class="user-holder f-right" style="cursor:pointer;">
			
				@if($currentUser->hasAccess('professional'))
					<a href="#" class="amount">USD $ {{$laravelUser->total_earnings}}</a>
				@endif
			
				{!! \App\Components\NotificationsPopup::render() !!}
			
			
			
				<div class="drop user-access" style="position: relative;">
			
			
			
					<p>{!! @trans('messages.greet', ['name' => $currentUser->first_name]) !!} <i class="fa fa-sort-desc" aria-hidden="true"></i></p>
			
			
			
					<div class="register-drop drop-menu">
			
			
			
						<div class="pop-arrow">
			
			
			
							<img src="{{asset('/frontsite/images/arrow-up.png')}}" alt="">
			
			
			
						</div>						
			
						@if(isset($currentUser))
							@if($currentUser->hasAnyAccess('professional'))
								<a href="{{route('frontsite.professionals.dashboard')}}" class="btn-default">Dashboard</a>
								<a href="{{route('frontsite.professionals.general-information')}}" class="btn-default">General Information</a>
								<a href="{{route('frontsite.professionals.my-profile')}}" class="btn-default">Profile</a>
								<a href="{{route('frontsite.professionals.events')}}" class="btn-default">List of Events</a>
								<a href="{{route('frontsite.professionals.funds.history')}}" class="btn-default">Fund History</a>
								<a href="{{route('frontsite.professionals.events.history')}}" class="btn-default">Event History</a>
								<a href="{{route('frontsite.professionals.membership')}}" class="btn-default">Membership</a>
								<a href="{{route('frontsite.professionals.reviews')}}" class="btn-default">Rating & Testimonials</a>
								<a href="{{route('frontsite.professionals.notifications')}}" class="btn-default">Notification</a>
								<a href="{{route('frontsite.professionals.account-information')}}" class="btn-default">Account Info</a>
							@else
								<a href="{{route('frontsite.clients.dashboard')}}" class="btn-default">Dashboard</a>
								<a href="{{route('frontsite.clients.my-profile')}}" class="btn-default">My Profile</a>
								<a href="{{route('frontsite.clients.events')}}" class="btn-default">My Events</a>
								<a href="{{route('frontsite.clients.reviews')}}" class="btn-default">Rating & Testimonials</a>
								<a href="{{route('frontsite.clients.account-info')}}" class="btn-default">Account Info</a>
								<!-- <a href="#" class="btn-default">Payment Info</a> -->
							@endif	
							<a href="{{ route('frontsite.switch-role', ['to_role' => session('user_switch_to_role')]) }}" class="btn-default">SWITCH TO {{ strtoupper(session('user_switch_to_role')) }}</a>
							<a href="{{route('admin.logout')}}" class="btn-default">Log Out</a>
						@endif
			
			
			
					</div>
			
			
			
				</div>
			
			
			
			</div>
		<!-- </nav> -->
		@else
		<nav class="login-link home f-right">
			<a class="log-in popup-with-zoom-anim" href="#open-login">LOGIN</a>
			<!-- <a href="#" id="btn-register-trig"> -->
			<a href="{{ route('frontsite.sign-up') }}">
				REGISTER  
				<!-- <i class="fa fa-sort-desc" aria-hidden="true"></i> -->
				<!-- <div class="register-drop">
					<div class="pop-arrow">
						<img src="{{asset('/frontsite/images/arrow-up.png')}}" alt="">
					</div>
					<label for="">Register as Client</label>
					<button type="submit" onclick="window.location='{{route('frontsite.clients.sign-up')}}'">Client <span class="client">Sign up</span></button>
					<div class="or-separate">
						<hr>
						<span>OR</span>
					</div>
					<label for="">Register as Professionals</label>
					<button type="submit" class="btn-default" onclick="window.location='{{route('frontsite.professionals.sign-up')}}'">Pro <span class="prof">Sign-up</span></button>
				</div> -->
			</a>
			<a href="" style="display:none;"></a>
		</nav>
		@endif
	</div>
</header>