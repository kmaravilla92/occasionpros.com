@inject('request','\Illuminate\Http\Request')

@extends($parentBlade)

@section('meta-title', $metaTitle)

@section('dashboard-content')
	<style>
		@if(isset($package))
			@if($package == 'free')
				.credit-cards.hidden {
					display: none;
				}
				.form-holder ul li.credit-card-fields.fixed {
					position: fixed;
					top: -999999px;
					left: -999999px;
				}
			@endif
		@endif
		.client-acct-info .form-holder .btn input[type="submit"] {
			margin: 20px;
		}
	</style>
	<div class="content client-acct-info">
		<div class="dash-title">
			@if(isset($withPaypalEmail))
				<h3>Payment Information</h3>
			@else
				<h3>Card Information</h3>
			@endif
		</div>

		<div class="form-holder">
			@if(isset($withPaypalEmail))
				<div class="acct-title">
					<h3>Credit Card</h3>
				</div>
			@endif
			<div class="img-holder credit-cards {{ isset($package) && $package == 'free' ? 'fixed' : '' }}">
				<img src="{{asset('/frontsite/images/card-info.jpg')}}" alt="">
			</div>
			{!!
				Form::open([
					'url' => $paymentFormUrl,
					'class' => 'ajaxify',
					'data-validation-rules' => 'credit_card_rules'
				])
			!!}
				@if($request->all())
					@foreach($request->all() as $key => $value)
						<input type="hidden" name="{{$key}}" value="{{$value}}">
					@endforeach
				@endif
				<ul>
					@if(isset($userMembership) && $userMembership->status != '3')
						<li class="clearfix">
							<h2>
								<span style="font-weight: normal;">
									<em style="color: #f00;">
										You still have existing membership. Proceeding with this process will automatically cancel your existing membership.
									</em>
								</span>
							</h2>
							<input type="hidden" name="cancel_existing_membership" value="1">
						</li>
					@endif
					@if(isset($amount_to_pay))
						<li class="clearfix">
							<h2><span style="font-weight: normal;">Amount to Pay: &nbsp;&nbsp;</span><i>{{$amount_to_pay}}</i></h2>
						</li>
					@endif
					<li class="credit-card-fields {{ isset($package) && $package == 'free' ? 'fixed' : '' }}">
						<ul style="margin: 0;">
							<li class="clearfix ">
								<div class="f-left half-width">
									<label for="">First Name</label>
									<input type="text" name="credit_card[first_name]" value="" >
								</div>
								<div class="f-right half-width">
									<label for="">Last Name</label>
									<input type="text" name="credit_card[last_name]" value="" >
								</div>
							</li>
							<li class="">
								<label for="">Card Number</label>
								<input type="text" name="credit_card[number]" value="" >
							</li>
							<li class="clearfix ">
								<div class="f-left half-width">
									<label for="">Expiration Date ( Month )</label>
									<!-- <input type="text" name="credit_card[exp_date_month]" value="" > -->
									<select name="credit_card[exp_date_month]" id="credit_card[exp_date_month]" class="select2autosuggest">
										<?php 
											$months = range(1,12);
										?>
										@foreach($months as $month)
											<?php 
												$month = $month < 10 ? str_pad($month, 2, 0, STR_PAD_LEFT) : $month; 
											?>
											<option value="{{$month}}">{{$month}}</option>
										@endforeach
									</select>
								</div>
								<div class="f-right half-width">
									<label for="">Expiration Date ( Year )</label>
									<!-- <input type="text" name="credit_card[exp_date_year]" value="" > -->
									<select name="credit_card[exp_date_year]" id="credit_card[exp_date_year]" class="select2autosuggest">
										<?php 
											$current_year = date('Y');
											$max_year = $current_year + 50;
											$years = range($current_year,$max_year);
										?>
										@foreach($years as $year)
											<option value="{{$year}}">{{$year}}</option>
										@endforeach
									</select>
								</div>
							</li>
							<li class="">
								<label for="" style="text-align:right;">Security Code  <a href=""><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
								<input type="text" name="credit_card[sec_code]" value="" >
							</li>
							<li class="">
								<label for="">Credit Card Type</label>
								<select class="select2autosuggest" name="credit_card[type]">
									@foreach(config('occ_pros.settings.payment.credit_card_types') as $typeSlug => $typeLabel)
										<option value="{{$typeSlug}}">{{$typeLabel}}</option>
									@endforeach
								</select>
							</li>
						</ul>
					</li>
					@if(isset($package) && $package == 'free')
						<li>
							<div class="check pull-left">
								<input type="checkbox" name="subscribe_to_bronze" value="1">
								<label for="" class="ease"></label>
							</div>
							<p class="pull-left" style="margin: 0 0 0 15px;">Automatically subscribe to <b><i>Pro Basic &nbsp; </i></b>package <br> on the 3rd month for only <b><i>{{config('occ_pros.membership.packages.bronze.prices.monthly.amount')}}</i></b> USD. </p>
							<div class="clearfix"></div>
						</li>
					@endif
				</ul>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" data-orig-text="SEND" value="SEND">
				</div>
			{!!
				Form::close()
			!!}
		</div>
		
		@if(isset($withPaypalEmail))
			<div class="form-holder">
				@if(isset($withPaypalEmail))
					<div class="acct-title">
						<h3>Paypal Email</h3>
					</div>
				@endif
				{!!
					Form::open([
						'url' => $paymentFormUrl,
						'class' => 'ajaxify credit-card-fields',
						'data-validation-rules' => 'credit_card_rules'
					])
				!!}
					@if($request->all())
						@foreach($request->all() as $key => $value)
							<input type="hidden" name="{{$key}}" value="{{$value}}">
						@endforeach
					@endif
					<ul>
						@if(isset($amount_to_pay))
							<li class="clearfix">
								<h2><span style="font-weight: normal;">Amount to Pay: &nbsp;&nbsp;</span><i>{{$amount_to_pay}}</i></h2>
							</li>
						@endif
						<li class="clearfix">
							<div class="f-left half-width">
								<label for="">First Name</label>
								<input type="text" name="credit_card[first_name]" value="" >
							</div>
							<div class="f-right half-width">
								<label for="">Last Name</label>
								<input type="text" name="credit_card[last_name]" value="" >
							</div>
						</li>
						<li>
							<label for="">Card Number</label>
							<input type="text" name="credit_card[number]" value="" >
						</li>
						<li class="clearfix">
							<div class="f-left half-width">
								<label for="">Expiration Date ( Month )</label>
								<!-- <input type="text" name="credit_card[exp_date_month]" value="" > -->
								<select name="credit_card[exp_date_month]" id="credit_card[exp_date_month]" class="select2autosuggest">
									<?php 
										$months = range(1,12);
									?>
									@foreach($months as $month)
										<?php 
											$month = $month < 10 ? str_pad($month, 2, 0, STR_PAD_LEFT) : $month; 
										?>
										<option value="{{$month}}">{{$month}}</option>
									@endforeach
								</select>
							</div>
							<div class="f-right half-width">
								<label for="">Expiration Date ( Year )</label>
								<!-- <input type="text" name="credit_card[exp_date_year]" value="" > -->
								<select name="credit_card[exp_date_year]" id="credit_card[exp_date_year]" class="select2autosuggest">
									<?php 
										$current_year = date('Y');
										$max_year = $current_year + 50;
										$years = range($current_year,$max_year);
									?>
									@foreach($years as $year)
										<option value="{{$year}}">{{$year}}</option>
									@endforeach
								</select>
							</div>
						</li>
						<li>
							<label for="" style="text-align:right;">Security Code  <a href=""><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
							<input type="text" name="credit_card[sec_code]" value="" >
						</li>
						<li>
							<label for="">Credit Card Type</label>
							<select class="select2autosuggest" name="credit_card[type]">
								@foreach(config('occ_pros.settings.payment.credit_card_types') as $typeSlug => $typeLabel)
									<option value="{{$typeSlug}}">{{$typeLabel}}</option>
								@endforeach
							</select>
						</li>
					</ul>
					<div class="btn">
						<input type="submit" name="" class="trans-btn btn-yellow" data-orig-text="SEND" value="SEND">
					</div>
				{!!
					Form::close()
				!!}
			</div>
		@endif
	</div>
@endsection

@include('components.select2autosuggest')

@section('js_bottom')
	<script>
		$(function() {
			$('[name="subscribe_to_bronze"]').on('click', function() {
				if($(this).is(':checked')) {
					$('.credit-card-fields, .credit-cards').removeClass('fixed');
				}else{
					$('.credit-card-fields, .credit-cards').addClass('fixed');
				}
			});
		});
	</script>
@endsection
