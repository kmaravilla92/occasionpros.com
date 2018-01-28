@inject('images', '\App\Services\File\Images')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Events')

@section('dashboard-content')
	<div class="content client-edit-prof">
		<div class="dash-title">
			<h3>Edit Profile Information</h3>
		</div>
		<div class="form-holder">
			{!!
				Form::open([
					'url' 	=> route('frontsite.clients.my-profile.update',[$user['id']]),
					'class' => 'ajaxify'
				])
			!!}
				{{method_field('PUT')}}
				{{csrf_field()}}
				<ul>
					<li>
						<label for="">First Name</label>
						<input type="text" name="user[first_name]" value="{{$profileInformation['first_name']}}">
					</li>
					<li>
						<label for="">Last Name</label>
						<input type="text" name="user[last_name]" value="{{$profileInformation['last_name']}}">
					</li>
					<li>
						<label for="">City, State</label>
						<input type="text" name="user[location]" value="{{$profileInformation['location']}}" id="location">
						<input type="hidden" name="latitude" id="location_lat" value="">
						<input type="hidden" name="longitude" id="location_lng" value="">
					</li>
				</ul>
				<div class="upload">
					<p>Upload Profile Image</p>
					<div class="img-holder">
                        <img src="{{$images->getImage('users/'.$user['id'].'/profile_115x115.jpg')}}" alt="">
					</div>
					<div class="file-upload">
						<input type="file" name="profile_pic" value="" id="profile_pic">
						<p>Upload Image</p>
					</div>
				</div>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" value="SAVE AND UPDATE" data-orig-text="SAVE AND UPDATE">
				</div>
			</form>
		</div>

	</div>
@endsection

@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])
@include('components.filereader', ['options'=>['targetInputFile'=>'#profile_pic','targetImage'=>'.img-holder img']])
