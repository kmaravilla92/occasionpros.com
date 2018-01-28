@inject('request', 'Illuminate\Http\Request')

@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Create Event')

@section('content')
    <style>
        .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
        span.select2-selection__rendered {
            font-style: normal !important;
        }
    </style>
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
					{!!
						Form::open([
							'url'		=>	route('frontsite.events.store'),
							'method'	=>	'POST',
							'class'		=>	'ajaxify',
							'id'		=>	'create-event',
							'data-validation-rules' => 'create_event_rules'
						])
					!!}
					<input type="hidden" name="next" value="{{$request->get('next')}}">
					<ul class="full-width">
						<li class="full-width">
							<p>Occasion Pros is here to help you connect with the top professionals in the industry. Enter your event information now to get started!<span> Feel free to
							<a href="{{route('frontsite.contact-us')}}">contact us</a> if you have any questions.</span></p>
						</li>
						<li class="full-width">
							<label for="title">Name of Event</label>
							{!!
								Form::text(
									'title',
									null,
									[
										'required' 	=> 	'required',
										'id'		=>	'title'
									]
								)
							!!}
						</li>
						<li class="full-width">
							<label for="description">Description</label>
							{!!
								Form::textarea(
									'description',
									null,
									[
										'required' 	=> 	'required',
										'id'		=>	'description'
									]
								)
							!!}
						</li>
					</ul>
					<ul class="clearfix">
						<li>
							<label for="type">Type of Event</label>
							{!!
								Form::select(
									'event_type_id',
									$eventTypes,
									null,
									[
										'required' 	    => 	'required',
										'id'		    =>	'type',
										'class'         =>  'select2autosuggest',
										'placeholder' 	=> 	'-- Select Event Type --'
									]
								)
							!!}
						</li>
						<li>
							<label for="date">Date & Time of Event</label>
							{!!
								Form::text(
									'date',
									null,
									[
										'class' 	=> 	'date',
										'required' 	=> 	'required',
										'id'		=>	'date',
										'readonly' 	=> 	true
									]
								)
							!!}
						</li>
						@if(!isset($currentUser))
							<li>
								<label for="email">Email Address</label>
								{!!
                                    Form::text(
                                        'email',
                                        null,
                                        [
                                            'required' 	=> 	'required',
                                            'id'		=>	'email'
                                        ]
                                    )
                                !!}
							</li>
                        @else
                            <input type="hidden" name="email" value="{{$currentUser->email}}">
						@endif
						<li>
							<label for="contact_number">Contact Number <br><span><strong>NOTE: Please make sure to put correct mobile number to be used in SMS verification. Make sure to include your international code e.g +63XXXXXXXXXX or 63XXXXXXXXX and without spaces or hyphens.</strong></span></label>
							{!!
								Form::text(
									'contact_number',
									null,
									[
										'required' 	=> 	'required',
										'id'		=>	'contact_number'
									]
								)
							!!}
						</li>
						<li>
							<label for="location">Location of Event</label>
							{!!
								Form::text(
									'location',
									null,
									[
										'required' 		=> 	'required',
										'id'			=>	'location',
										'class' 		=>	'location',
										'placeholder' 	=> 'City, State, Zipcode'
									]
								)
							!!}
                            <input type="hidden" name="latitude" id="location_lat" value="">
                            <input type="hidden" name="longitude" id="location_lng" value="">
						</li>
						<li>
							<label for="budget">Budget ($)</label>
							{!!
								Form::number(
									'budget',
									null,
									[
										'required' 		=> 	'required',
										'id'			=>	'budget',
										'min'     =>  '1'
									]
								)
							!!}
						</li>
					</ul>
					<ul class="full-width">
						<li class="agreement">
							<div class="check">
								{!!
									Form::checkbox(
										'accept_agreement',
										1,
										false,
										[
											'required' 	=>	'required'
										]
									)
								!!}
								<label for="" class="ease"></label>
							</div>
							<p>By checking this, you indicate that you have read and agree to the <a href="{{route('frontsite.terms-of-use')}}" target="_blank">Terms of Use</a> and <a href="{{route('frontsite.privacy-policy')}}" target="_blank">Privacy Policy</a>.</p>
						</li>
						<li class="agreement">
							<div class="check">
								{!!
									Form::checkbox(
										'receive_confirmation_email',
										1,
										false,
										[
											'required' 	=>	'required'
										]
									)
								!!}
								<label for="" class="ease"></label>
							</div>
							<p>You will receive a confirmation email and an SMS from OP to verify & confirm your event.</p>
						</li>
                        <li class="captcha">
                            {{--<img src="{{asset('/frontsite/images/captcha.png')}}" alt="">--}}
                            <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                            <div class="g-recaptcha" data-sitekey="6Lf80BkUAAAAAJYPxuiShtlUuDIitZRouc5M8Puh"></div>
                        </li>
					</ul>
					<input type="submit" name="" value="SUBMIT {{isset($request->next) ? '& SEE RESULTS' : ''}}" class="trans-btn sub-btn" data-orig-text="SUBMIT {{isset($request->next) ? '& SEE RESULTS' : ''}}">
				{!! Form::close() !!}
				</div>
			</div>
		</div>
		</div>
	</section>
@endsection

@include('components.select2autosuggest')
@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])

@section('css_head')
	<link rel="stylesheet" href="{{asset('bower_components/jquery-ui/themes/base/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontsite/css/lib/jquery.datetimepicker.css')}}">
@endsection

@section('js_bottom')
    @include('frontsite.includes.recaptcha_js')
    <script src="{{asset('frontsite/js/lib/jquery.datetimepicker.full.min.js')}}"></script>
	<script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.min.js')}}"></script>
	<script>
		$(function() {
            // TODO: Ask client how many
            // days must be booked is advanced
            $('.date').datetimepicker({
                timepicker: true,
                format:'M d Y H:i',
                minDate: 0,
                step: 5
            });
		});
	</script>
@endsection
