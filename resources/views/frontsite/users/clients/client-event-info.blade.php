@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Create Event')

@section('content')
	<section id="main-wrapper" class="client-signup client-event-info">
		<div class="banner-holder" style="background:url('{{url('/frontsite/images/client-banner.jpg')}}')">
			<div class="title-holder white-text">
				<h3>
					<span>Enter event</span>
					INFORMATION
				</h3>
				<hr>
			</div>
		</div>
		<div class="result-section section">
			<div class="wrapper">
				<div class="form-holder event-info-form box">
					<form class="" action="client-sign-up.html" method="post">
					<ul class="full-width">
						<li class="full-width">
							<p>Occasion Pros is here to help you connect with the top professionals in the industry. Enter your event information now to get started!<span> Feel free to
							<a href="contact.html">contact us</a> if you have any questions.</span></p>
						</li>
						<li class="full-width">
							<label for="">Name of Event</label>
							<input type="text" name="" value="">
						</li>
						<li>
							<label for="">Name of Event</label>
							<textarea name="name"></textarea>
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<label for="">Type of Event</label>
							<input type="text" name="" value="">
						</li>
						<li>
							<label for="">Date & Time of Event</label>
							<input type="text" name="" value="" class="date">
						</li>
						<li>
							<label for="">Email Address</label>
							<input type="email" name="" value="">
						</li>
						<li>
							<label for="">Phone Number</label>
							<input type="number" name="" value="">
						</li>
						<li>
							<label for="">Location of Event</label>
							<input type="text" name="" value="" class="location" placeholder="City, State">
						</li>
						<li>
							<label for="">Budget</label>
							<input type="number" name="" value="">
						</li>
					</ul>
					<ul class="full-width">
						<li class="agreement">
							<div class="check">
								<input type="checkbox" name="" value="">
								<label for="" class="ease"></label>
							</div>
							<p>By checking this, you indicate that you have read and agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
						</li>
						<li class="agreement">
							<div class="check">
								<input type="checkbox" name="" value="">
								<label for="" class="ease"></label>
							</div>
							<p>You will receive a confirmation email and a call from OP to verify & confirm your event.</p>
						</li>
						<li class="captcha">
							<img src="{{asset('/frontsite/images/captcha.png')}}" alt="">
						</li>
					</ul>
					<input type="submit" name="" value="SUBMIT" class="trans-btn sub-btn">
				</form>
				</div>
			</div>
		</div>
		</div>
	</section>
@endsection