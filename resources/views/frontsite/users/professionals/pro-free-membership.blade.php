@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Membership')

@section('dashboard-content')
<style>
	.client-acct-info .form-holder .btn input[type="submit"] {margin: 20px;}
</style>
<div class="content client-acct-info">
	<div class="dash-title">
		<h3>Card Information</h3>
	</div>
	<div class="form-holder">
		{!!
			Form::open([
				'url' => $paymentFormUrl,
				'method' => 'GET' 
			])
		!!}
		@foreach(['package'=>'free','duration'=>'monthly'] as $key => $value)
			<input type="hidden" name="{{$key}}" value="{{$value}}">
		@endforeach
		<ul>
			<li>
				<h2><span style="font-weight: normal;">Amount to Pay: &nbsp;&nbsp;</span><i>0 ( FREE )</i></h2>
			</li>
			<li>
				<div class="check pull-left">
					<input type="checkbox" name="subscribe_to_bronze" value="1">
					<label for="" class="ease"></label>
				</div>
				<p class="pull-left" style="margin: 0 0 0 15px;">Subscribe to Bronze on the 3rd month</p>
				<div class="clearfix"></div>
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
