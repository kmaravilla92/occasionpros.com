@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Ad '. $ad ? 'Edit' : 'Create')

@section('dashboard-content')

	<div class="content client-acct-info">
		<div class="dash-title">
			<h3>{{$ad ? 'Edit' : 'Create'}} Ad <a href="{{route('frontsite.professionals.ads')}}" class="f-right ">Ads List</a></h3>
		</div>

		<div class="form-holder">
			{!!
				Form::open([
					'url' => $form['url'],
					'class' => 'ajaxify'
				])
			!!}
			@if($ad)
				{{method_field('PUT')}}
			@endif
				<ul>
					<li class="clearfix">
						<div class="full-width">
							<label for="">Title</label>
							<input type="text" name="ad[title]" value="{{$ad ? $ad['title'] : ''}}" required>
						</div>
					</li>
					<li>
						<div class="full-width">
							<label for="">Content</label>
							<textarea name="ad[content]" id="" cols="30" rows="10" required>{{$ad ? $ad['content'] : ''}}</textarea>
						</div>
					</li>
					<li>
						<div class="full-width">
							<label for="">Location</label>
							{!!
								Form::text(
									'ad[location]',
									$ad ? $ad['location'] : null,
									[
										'required' 		=> 	'required',
										'id'			=>	'location',
										'class' 		=>	'location',
										'placeholder' 	=> 'City, State, Zipcode'
									]
								)
							!!}
							<input type="hidden" name="ad[latitude]" id="location_lat" value="{{$ad ? $ad['latitude'] : null}}">
                            <input type="hidden" name="ad[longitude]" id="location_lng" value="{{$ad ? $ad['longitude'] : null}}">
						</div>
					</li>
				</ul>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" data-orig-text="NEXT" value="NEXT">
				</div>
			{!!
				Form::close()
			!!}
		</div>
	</div>
@endsection

@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])
