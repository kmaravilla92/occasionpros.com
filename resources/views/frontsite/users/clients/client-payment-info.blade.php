@inject('request','\Illuminate\Http\Request')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Payment Info')

@section('dashboard-content')

	<div class="content client-acct-info">
		<div class="dash-title">
			<h3>Card Information</h3>
		</div>

		<div class="form-holder">
			<div class="img-holder">
				<img src="{{asset('/frontsite/images/card-info.jpg')}}" alt="">
			</div>
			{!!
				Form::open([
					'url' => route('frontsite.clients.payment-info.store',['bid_id'=>$request->bid_id]),
					'class' => 'ajaxify',
					'data-validation-rules' => 'credit_card_rules'
				])
			!!}
				<ul>
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
							<input type="text" name="credit_card[exp_date_month]" value="" >
						</div>
						<div class="f-right half-width">
							<label for="">Expiration Date ( Year )</label>
							<input type="text" name="credit_card[exp_date_year]" value="" >
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
	</div>
@endsection

@include('components.select2autosuggest')
