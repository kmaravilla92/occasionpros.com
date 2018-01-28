@inject('request','Illuminate\Http\Request')

@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Sign Up')

@section('content')
    <style>
        .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
        .role_type_holder {width: 35%;}
        .role_type_holder .role_type {margin: 3px 0 3px 12px;}
        #professional_fields,
        #professional_fields li {
        	width: 100%;
        }
        #professional_fields .title {text-align: center;}
        .select2-selection.select2-selection--multiple {
			border: 1px solid #b6b6b6;
			padding-bottom: 8px;
		}
		.pro-edit-prof ul li.full-width ul.select2-selection__rendered,
		.select2-selection__choice {
			background: #fff !important;
		}
		.select2-selection__choice {
			margin: 3px 3px 0 0 !important;
		    padding: 7px 8px !important;
		    width: auto !important;
		}
		.select2-search.select2-search--inline {
			/*display: none !important;*/
			margin: 0;
			padding: 0;
		}
		.select2-container--default.select2-container--focus .select2-selection--multiple {
			border: 1px solid #aaa;
		}
    </style>
	<section id="main-wrapper" class="client-signup pro-signup">
		<div class="result-section section">
			<div class="wrapper">
				@if($request->input('next_url'))
                    <div class="title-holder">
                        <h3>
                            <span>Already have an account?</span>
                        </h3>
                    </div>
                    <div class="form-holder sign-up-form box">
                        <form action="{{route('admin.login.post')}}" method="POST" class="login-form ajaxify">
                            {{csrf_field()}}
                            <input type="hidden" name="next_url" value="{{$request->input('next_url')}}">
                            <br>
                            <div class="input-holder">
                                <label for="">Email Address</label>
                                <input type="text" name="email" id="">
                            </div>
                            <br>
                            <div class="input-holder">
                                <label for="">Password</label>
                                <input type="password" name="password" id="">
                            </div>
                            <input type="submit" name="" value="NEXT" class="trans-btn sub-btn" data-orig-text="NEXT">
                            {{--<div class="fs-stalic forgot">
                                <a href="#open-forgot" class="popup-with-zoom-anim">Forgot Password?</a>
                            </div>--}}
                        </form>
                    </div>
                    <div class="log-link">
                        <p class="or">OR</p>
                    </div>
                    <div class="title-holder">
                        <h3>
						<span>Don't have an account? <br>
						Register here...</span>
                        </h3>
                    </div>
                @else
                    <div class="title-holder">
                        <h3>
						<!-- <span>Client</span> -->
						SIGN UP
                        </h3>
                    </div>
                @endif

				<div class="form-holder sign-up-form box">
					{!!
						Form::open([
							'url'		=>	route('frontsite.sign-up.post'),
							'method'	=>	'POST',
							'id'		=>	'client-sign-up',
							'class'     =>  'ajaxify',
							'data-validation-rules' => 'sign_up_rules'
						])
					!!}
                        <input type="hidden" name="next_url" value="{{$request->input('next_url')}}">
						<ul>
							<li>
								<label for="first_name">First Name</label>
								{!!
									Form::text(
										'first_name',
										null,
										[
											'id' 		=> 	'first_name',
											'required'	=>	'required'
										]
									)
								!!}
							</li>
							<li>
								<label for="last_name">Last Name</label>
								{!!
									Form::text(
										'last_name',
										null,
										[
											'id' 		=> 	'last_name',
											'required'	=>	'required'
										]
									)
								!!}
							</li>
							<li>
								<label for="email">Email Address</label>
								{!!
									Form::email(
										'email',
										null,
										[
											'id' 		=> 	'email',
											'required'	=>	'required'
										]
									)
								!!}
							</li>
							<li>
								<label for="confirm_email">Confirm Email Address</label>
								{!!
									Form::email(
										'confirm_email',
										null,
										[
											'id' 			=> 	'confirm_email',
											'required'		=>	'required'
										]
									)
								!!}
							</li>
							<li>
								<label for="password">Password</label>
								{!!
									Form::password(
										'password',
										[
											'id' 		=> 	'password',
											'required'	=>	'required'
										]
									)
								!!}
							</li>
							<li>
								<label for="confirm_password">Confirm Password</label>
								{!!
									Form::password(
										'confirm_password',
										[
											'id' 		=> 	'confirm_password',
											'required'	=>	'required'
										]
									)
								!!}
							</li>

							<li style="width: 100%;">
								<label for="role_types">I want to be a:</label>
								<br>
								<div class="role_type_holder fl">
									<label for="role_type_pro" class="fl">Professional</label>
									{!!
										Form::radio(
											'user_type',
											'professional',
											true,
											[
												'required' 	=>	'required',
												'class' => 'role_type fl',
												'id' => 'role_type_pro',
												'data-dont-change' => true
											]
										);
									!!}
								</div>
								<div class="role_type_holder fl">
									<label for="role_type_client" class="fl">Client</label>
									{!!
										Form::radio(
											'user_type',
											'client',
											false,
											[
												'required' 	=>	'required',
												'class' => 'role_type fl',
												'id' => 'role_type_client',
												'data-dont-change' => true
											]
										);
									!!}
								</div>
								<div class="clr"></div>
							</li>

							<!-- for pros -->
						
							<li id="professional_fields">
								<hr>
								<h2 class="title">For Professionals</h2>
								<ul>
									<li style="width: 100%;">
										<label for="category">Category</label>
										{!!
											Form::select(
												'category',
												$pro_categories,
												null,
												[
													'id' 			=> 	'category',
													'class' 		=>  'select2autosuggest',
													'placeholder' 	=> 	'-- Select Category --'

												]
											)
										!!}
									</li>
									<li style="width: 100%;">
										<label for="countries_served">Counties Served ( <b><i>Max of 3 Counties</i></b> )</label>
										{!!
											Form::select(
												'countries_served[]',
												$counties,
												-1,
												[
													'id' 		    => 	'countries_served',
													'class' 		=>  'select2autosuggest',
													'multiple' 		=>  'multiple'
												]
											)
										!!}
									</li>
									<li>
										<label for="contact_number">Contact Number</label>
										{!!
											Form::text(
												'contact_number',
												null,
												[
													'id' 		=> 	'contact_number',
												]
											)
										!!}
									</li>
									<li>
										<label for="location">Location</label>
										{!!
											Form::text(
												'location',
												null,
												[
													'id' 			=> 	'location',
													'class' 		=>	'location',
													'placeholder' 	=>	'City, State or Zip Code'
												]
											)
										!!}
		                                <input type="hidden" name="latitude" id="location_lat" value="">
		                                <input type="hidden" name="longitude" id="location_lng" value="">
									</li>
									
									<li style="width: 100%;">
										<label for="willing_distance_to_travel">Willing to Travel</label>
										{!!
											Form::select(
												'willing_distance_to_travel',
												config('occ_pros.settings.pros.form.willing_distance_to_travel'),
												null,
												[
													'id' 		=> 	'willing_distance_to_travel',
													'class'     =>  'select2autosuggest',
													'placeholder' => '-- Please Distance --'
												]
											)
										!!}
									</li>
		                            <li style="display:none;"></li>
								</ul>
							</li>

							<!-- for pros -->

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
										);
									!!}
									<label for="" class="ease"></label>
								</div>

								<p>By checking this, you indicate that you have read and agree to the <a href="{{route('frontsite.terms-of-use')}}" target="_blank">Terms of Use</a> and <a href="{{route('frontsite.privacy-policy')}}" target="_blank">Privacy Policy</a>.</p>
							</li>
							<li class="agreement">
								<div class="check">
									{!!
										Form::checkbox(
											'sign_me_up',
											1,
											false,
											[]
										);
									!!}
									<label for="" class="ease"></label>
								</div>
								<p>Subscribe to newsletter to receive list of TOP professionals profiles and events.</p>
							</li>
							<li class="captcha">
								{{--<img src="{{asset('/frontsite/images/captcha.png')}}" alt="">--}}
                                <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                                <div class="g-recaptcha" data-sitekey="6Lf80BkUAAAAAJYPxuiShtlUuDIitZRouc5M8Puh"></div>
							</li>
						</ul>
						<input type="submit" name="" value="SIGN UP" class="trans-btn sub-btn" data-orig-text="SIGN UP">
					</form>
				</div>
                @include(
                    'frontsite.layouts.partials.or-login',
                    [
                        'login_fb_user_type' => 'client'
                    ]
                )
			</div>
		</div>
	</section>
@endsection
@include('components.select2autosuggest', ['options'=>['placeholder' => true, 'maximumSelectionLength' => 3]])
@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])
@section('js_bottom')
    @include('frontsite.includes.recaptcha_js')
    <script>
    	$(function(){
    		var $professional_fields = $('#professional_fields'),
    			$role_type = $('.role_type')
    			$role_type.on('change', function() {
    				var $this = $(this);
    				$professional_fields.toggle( $this.val() == 'professional' );
    			});
    	});
    </script>
@endsection