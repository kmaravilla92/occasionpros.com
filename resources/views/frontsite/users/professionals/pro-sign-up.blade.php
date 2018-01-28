@extends('frontsite.layouts.main')@section('meta-title',' Professional Sign Up')@section('content')    <style>        .g-recaptcha > div { margin: 0 auto;}        .hidden_recaptcha { visibility: hidden;}        .select2-selection.select2-selection--multiple {			border: 1px solid #b6b6b6;			padding-bottom: 8px;		}		.pro-edit-prof ul li.full-width ul.select2-selection__rendered,		.select2-selection__choice {			background: #fff !important;		}		.select2-selection__choice {			margin: 3px 3px 0 0 !important;		    padding: 7px 8px !important;		    width: auto !important;		}		.select2-search.select2-search--inline {			display: none !important;		}		.select2-container--default.select2-container--focus .select2-selection--multiple {			border: 1px solid #aaa;		}    </style>	<section id="main-wrapper" class="client-signup pro-signup">		<div class="result-section section">			<div class="wrapper">				<div class="title-holder">					<h3>						<span>Pro</span>						SIGN-UP					</h3>				</div>				<div class="form-holder sign-up-form box">						{!!							Form::open([								'url'		=>	route('frontsite.professionals.sign-up'),								'method'	=>	'POST',								'id'		=>	'professional-sign-up',								'class'     =>  'ajaxify',								'data-validation-rules' => 'pro_sign_up_rules'							])						!!}						<ul>							<li>								<label for="first_name">First Name</label>								{!!									Form::text(										'first_name',										null,										[											'id' 		=> 	'first_name',											'required'	=>	'required'										]									)								!!}							</li>							<li>								<label for="last_name">Last Name</label>								{!!									Form::text(										'last_name',										null,										[											'id' 		=> 	'last_name',											'required'	=>	'required'										]									)								!!}							</li>							<li style="width: 100%;">								<label for="category">Category</label>								{!!									Form::select(										'category',										$pro_categories,										null,										[											'id' 			=> 	'category',											'class' 		=>  'select2autosuggest',											'required'		=>	'required',											'placeholder' 	=> 	'-- Select Category --'										]									)								!!}							</li>							<li style="width: 100%;">								<label for="countries_served">Counties Served ( <b><i>Max of 3 Countries</i></b> )</label>								{!!									Form::select(										'countries_served',										config('occ_pros.settings.pros.form.countries_served_list'),										-1,										[											'id' 		    => 	'countries_served',											'class' 		=>  'select2autosuggest',											'required'	    =>	'required',											'multiple' 		=>  'multiple',											'placeholder' 	=> 	'-- Select Countries --'										]									)								!!}							</li>							<li>								<label for="contact_number">Contact Number</label>								{!!									Form::text(										'contact_number',										null,										[											'id' 		=> 	'contact_number',											'required'	=>	'required'										]									)								!!}							</li>							<li>								<label for="location">Location</label>								{!!									Form::text(										'location',										null,										[											'id' 			=> 	'location',											'class' 		=>	'location',											'required'		=>	'required',											'placeholder' 	=>	'City, State or Zip Code'										]									)								!!}                                <input type="hidden" name="latitude" id="location_lat" value="">                                <input type="hidden" name="longitude" id="location_lng" value="">							</li>							{{----}}							<li style="width: 100%;">								<label for="willing_distance_to_travel">Willing to Travel</label>								{!!									Form::select(										'willing_distance_to_travel',										config('occ_pros.settings.pros.form.willing_distance_to_travel'),										null,										[											'id' 		=> 	'willing_distance_to_travel',											'required'	=>	'required',											'class'     =>  'select2autosuggest',											'placeholder' => '-- Please Distance --'										]									)								!!}							</li>                            <li style="display:none;"></li>							{{----}}							<li>								<label for="email">Email Address</label>								{!!									Form::email(										'email',										null,										[											'id' 			=> 	'email',											'required'		=>	'required'										]									)								!!}							</li>							<li>								<label for="confirm_email">Confirm Email Address</label>								{!!									Form::email(										'confirm_email',										null,										[											'id' 			=> 	'confirm_email',											'required'		=>	'required'										]									)								!!}							</li>							<li>								<label for="">Password</label>								{!!									Form::password(										'password',										[											'id' 			=> 	'password',											'required'		=>	'required'										]									)								!!}							</li>							<li>								<label for="confirm_password">Confirm Password</label>								{!!									Form::password(										'confirm_password',										[											'id' 			=> 	'confirm_password',											'required'		=>	'required'										]									)								!!}							</li>							<li class="agreement">								<div class="check">									{!!										Form::checkbox(											'accept_agreement',											1,											false,											[												'required' 	=>	'required'											]										)									!!}									<label for="" class="ease"></label>								</div>								<p>By checking this, you indicate that you have read and agree to the <a href="{{route('frontsite.terms-of-use')}}" target="_blank">Terms of Use</a> and <a href="{{route('frontsite.privacy-policy')}}" target="_blank">Privacy Policy</a>.</p>							</li>							<li class="agreement">								<div class="check">									{!!										Form::checkbox(											'sign_me_up',											1,											false,											[]										)									!!}									<label for="" class="ease"></label>								</div>								<p>Subscribe to newsletter to receive list of TOP events.</p>							</li>							<li class="captcha">								{{--<img src="{{asset('/frontsite/images/captcha.png')}}" alt="">--}}								<input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>								<div class="g-recaptcha" data-sitekey="6Lf80BkUAAAAAJYPxuiShtlUuDIitZRouc5M8Puh"></div>							</li>						</ul>						<input type="submit" name="" value="NEXT" class="trans-btn sub-btn" data-orig-text="NEXT">						{!!							Form::close()						!!}					</div>				@include(					'frontsite.layouts.partials.or-login',					[						'login_fb_user_type' => 'professional'					]				)				</div>			</div>		</div>	</section>@endsection@include('components.select2autosuggest', ['options'=>['placeholder' => true, 'maximumSelectionLength' => 3]])@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])@section('js_bottom')	@include('frontsite.includes.recaptcha_js')@endsection