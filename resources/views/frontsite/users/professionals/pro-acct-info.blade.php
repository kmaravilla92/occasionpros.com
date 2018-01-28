@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Account Information')

@section('dashboard-content')
	<div class="content client-acct-info pro-noti">
		<div class="dash-title clearfix">
			<h3>Account Information</h3>
		</div>
		<div class="form-holder">
			<div class="acct-title">
				<h3>Change Email Address</h3>
			</div>
			{!!
				Form::open([
					'url' 		=> route('frontsite.professionals.account-info.email.update'),
					'method' 	=> 'PUT',
					'class' 	=> 'ajaxify',
					'data-validation-rules' => 'professionals_update_password'
				])
			!!}
				<ul>
					<li>
						<p>This is the email address you’ll use to log in to Occasion Pros.</p>
						<label for="">Login Email Address</label>
						<input type="email" name="new_email" value="{{$user->email}}" placeholder="" required>
					</li>
					<li>
						<label for="">Current Password</label>
						<input type="password" name="current_password" value="" required minlength="6">
						<p>Type your password to verify ownership of this account.</p>
					</li>
				</ul>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" data-orig-text="UPDATE EMAIL ADDRESS" value="UPDATE EMAIL ADDRESS">
				</div>
			{!!
			 	Form::close()
			!!}
		</div>
		<div class="form-holder">
			<div class="acct-title">
				<h3>Change Password</h3>
			</div>
			{!!
				Form::open([
					'url' 		=> route('frontsite.professionals.account-info.password.update'),
					'method' 	=> 'PUT',
					'class' 	=> 'ajaxify',
					'data-validation-rules' => 'professionals_update_password'
				])
			!!}
				<ul>
					<li>
						<label for="">Current Password</label>
						<input type="password" name="passwords[current]" value="" >
					</li>
					<li>
						<label for="">New Password</label>
						<input type="password" name="passwords[new]" value="">
					</li>
					<li>
						<label for="">Confirm New Password</label>
						<input type="password" name="passwords[confirm_new]" value="">
					</li>
				</ul>

				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" value="UPDATE PASSWORD" data-orig-text="UPDATE PASSWORD">
				</div>
			{!!
				 Form::close()
			!!}
		</div>
	</div>
@endsection