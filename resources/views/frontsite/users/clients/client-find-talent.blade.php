@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Search')

@section('content')
	<section id="main-wrapper" class="about-page">
		<div class="section about-holder">
			<div class="title-holder">
				<h3>
					<span>Find</span>
					TALENT
				</h3>
				<hr>
			</div>
			<br>
			<div class="location-bar clearfix">
				<div class="form-holder">
					{!!
						Form::open([
							'url'		=>	route('frontsite.clients.search.professionals'),
							'method'	=>	'GET'
						])
					!!}
					<form action="">
						<div class="forty-width f-left">
							<label for="category">I’m looking for a</label>
							{!!
								Form::select(
									'category',
									$pro_categories,
									null,
									[
										'id' 			=> 	'category',
										'placeholder' 	=> 	'-- Select --',
										'class' 		=>	'select2autosuggest' 
									]
								)
							!!}
						</div>
						<div class="forty-width f-left">
							<label for="">My event is in</label>
							{!!
								Form::text(
									'location',
									null,
									[
										'id'			=>	'location',
										'placeholder' 	=> 	'City, State or Zip Code'
									]
								)
							!!}
							<input type="hidden" name="latitude" id="location_lat" value="">
                            <input type="hidden" name="longitude" id="location_lng" value="">
						</div>
						<div class="twenty-width f-left">
							<input type="submit" name="" class="trans-btn btn-yellow" value="SEARCH" >
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>
@endsection
@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])
@include('components.select2autosuggest', [])
