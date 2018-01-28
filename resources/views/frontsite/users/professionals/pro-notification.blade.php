@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Notifications')

@section('dashboard-content')
	<div class="content client-acct-info pro-noti">
		<div class="dash-title clearfix">
			<h3>Notification</h3>
		</div>
		<div class="form-holder">
			<div class="acct-title">
				<h3>Email Notification</h3>
			</div>
			{!!
				Form::open([
					'url' 		=> route('frontsite.professionals.notifications.update'),
					'method' 	=> 'PUT',
					'class' 	=> 'ajaxify',
					'data-validation-rules' => 'professionals_update_notification_settings'
				])
			!!}
				<ul>
					<li>
						<div class="check">
							<input type="checkbox" name="notification_settings[receive_important_account_alerts]" value="1" {{$userSettings['receive_important_account_alerts']['value'] == 1 ? 'checked' : ''}}>
							<label></label>
						</div>
						<span>Receive important account alerts (recommended)</span>
					</li>
					<li>
						<div class="check">
							<input type="checkbox" name="notification_settings[receive_lead_and_booking_alers]" value="1" {{$userSettings['receive_lead_and_booking_alers']['value'] == 1 ? 'checked' : ''}}>
							<label></label>
						</div>
						<span>Receive lead and booking alerts (recommended)</span>
					</li>
					<li>
						<div class="check">
							<input type="checkbox" name="notification_settings[receive_notifications_for_new_client_reviews]" value="1" {{$userSettings['receive_notifications_for_new_client_reviews']['value'] == 1 ? 'checked' : ''}}>
							<label></label>
						</div>
						<span>Receive notifications for new client reviews</span>
					</li>
					<li class="margin-up">
						<label for="">Notification Email Address</label>
						<input type="email" name="notification_settings[receiving_email]" value="{{$userSettings['receiving_email']['value']}}">
					</li>
				</ul>

				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" value="UPDATE EMAIL NOTIFICATION" data-orig-text="UPDATE EMAIL NOTIFICATION">
				</div>
			{!!
				 Form::close()
			!!}
		</div>
	</div>
@endsection