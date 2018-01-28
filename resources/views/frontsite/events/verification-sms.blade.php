@inject('request', 'Illuminate\Http\Request')

@extends('frontsite.layouts.main')

@section('meta-title', 'Event SMS Verification')

@section('content')
	<section id="main-wrapper" class="client-signup client-event-info">
		<div class="banner-holder" style="background:url('{{url('/frontsite/images/client-banner.jpg')}}')">
			<div class="title-holder white-text">
				<h3>
					<span>Event</span>
					SMS VERIFICATION
				</h3>
				<hr>
			</div>
		</div>
		<div class="result-section section">
			<div class="wrapper">
				<div class="form-holder event-info-form box">
					{!!
						Form::open([
							'url'		=>	route('frontsite.events.verify-by-sms.post', ['event_uid' => $eventPost->uid]),
							'method'	=>	'POST',
							'class'		=>	'ajaxify',
							'id'		=>	'verify-event=sms'
						])
					!!}
					<input type="hidden" name="next" value="{{$request->get('next')}}">
					<ul class="full-width">
						<li class="full-width">
							<p>Enter the 5 digit code that you received from OP via SMS. <span>Didn't get a code ? click <a href="{{ route('frontsite.events.verify', ['event_id' => $eventPost->id ,'resend_sms_code' => 1]) }}">here</a> to get one.</span>
						</li>
						<li class="full-width">
							<label for="title">SMS Verification Code</label>
							{!!
								Form::text(
									'sms_verification_code',
									null,
									[
										'required' 	=> 	'required',
										'id'		=>	'title'
									]
								)
							!!}
						</li>
					</ul>
					<input type="submit" name="" value="VERIFY" class="trans-btn sub-btn" data-orig-text="VERIFY">
				{!! Form::close() !!}
				</div>
			</div>
		</div>
		</div>
	</section>
@endsection
