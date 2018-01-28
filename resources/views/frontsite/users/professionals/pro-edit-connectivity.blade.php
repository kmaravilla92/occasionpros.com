@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Dashboard')

@section('dashboard-content')
	<div class="content client-edit-prof pro-edit-prof">
		<div class="dash-title clearfix">
			<h3>Edit Connectivity</h3>
		</div>

		<div class="form-holder ">
			<form class="ajaxify" action="{{route('frontsite.professionals.profile.connectivity.update',[$currentUser->id])}}" method="POST" data-validation-rules="social_links_rules">
				{{csrf_field()}}
                {{ method_field('PUT') }}
				<ul class="full-width">
					<li class="full-width">
						<label><i class="fa fa-link" aria-hidden="true" style="color:#345bab;"></i>
							Website
						</label>
						<input type="text" name="social_links[website]" value="{{$social_links->website}}" placeholder="e.g http://www.sample.com">
					</li>
					<li class="full-width">
						<label><i class="fa fa-facebook" aria-hidden="true" style="color:#093864;"></i>
							Facebook (optional)
						</label>
						<input type="text" name="social_links[facebook]" value="{{$social_links->facebook}}" placeholder="e.g http://www.facebook.com/someuser">
					</li>
					<li class="full-width">
						<label><i class="fa fa-twitter" aria-hidden="true" style="color:#40b0e4;"></i>
							Twitter (optional)
						</label>
						<input type="text" name="social_links[twitter]" value="{{$social_links->twitter}}" placeholder="e.g http://www.twitter.com/someuser">
					</li>
					<li class="full-width">
						<label><i class="fa fa-pinterest" aria-hidden="true" style="color:#8c1717;"></i>
							Pinterest (optional)
						</label>
						<input type="text" name="social_links[pinterest]" value="{{$social_links->pinterest}}" placeholder="e.g http://www.pinterest.com/someuser">
					</li>
					<li class="full-width">
						<label><i class="fa fa-instagram" aria-hidden="true" style="color:#483e28;"></i>
							Instagram (optional)
						</label>
						<input type="text" name="social_links[instagram]" value="{{$social_links->instagram}}" placeholder="e.g http://www.instagram.com/someuser">
					</li>
				</ul>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" value="SAVE AND UPDATE">
				</div>
			</form>
		</div>

	</div>
@endsection