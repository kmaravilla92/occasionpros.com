@inject('request','Illuminate\Http\Request')

@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Sign Up')

@section('content')
    <style>
        .g-recaptcha > div { margin: 0 auto;}
        .hidden_recaptcha { visibility: hidden;}
    </style>
	<section id="main-wrapper" class="client-signup">
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
						<span>Client</span>
						SIGN UP
                        </h3>
                    </div>
                @endif

				<div class="form-holder sign-up-form box">
					{!!
						Form::open([
							'url'		=>	route('frontsite.clients.sign-up.post'),
							'method'	=>	'POST',
							'id'		=>	'client-sign-up',
							'class'     =>  'ajaxify',
							'data-validation-rules' => 'client_sign_up_rules'
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
								<p>Subscribe to newsletter to receive list of TOP professionals profiles.</p>
							</li>
							<li class="captcha">
								{{--<img src="{{asset('/frontsite/images/captcha.png')}}" alt="">--}}
                                <input type="text" class="hidden_recaptcha required" name="hidden_recaptcha" id="hidden_recaptcha" required>
                                <div class="g-recaptcha" data-sitekey="6Lf80BkUAAAAAJYPxuiShtlUuDIitZRouc5M8Puh"></div>
							</li>
						</ul>
						<input type="submit" name="" value="NEXT" class="trans-btn sub-btn" data-orig-text="NEXT">
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

@section('js_bottom')
    @include('frontsite.includes.recaptcha_js')
@endsection