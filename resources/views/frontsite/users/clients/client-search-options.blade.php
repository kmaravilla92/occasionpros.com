@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Search Options')

@section('content')
	<section id="main-wrapper" class="client-search-option">
		<div class="result-section section">
			<div class="wrapper">
				<div class="title-holder">
					<h3>
						<span>Choose an</span>
						OPTION
					</h3>
					<div class="option-container">
						{!!
							Form::open([
								'url'		=>	route('frontsite.clients.search.options.check'),
								'method'	=>	'GET'
							])
						!!}
							<input type="hidden" name="category" value="{{Request::get('category')}}">
							<input type="hidden" name="location" value="{{Request::get('location')}}">
							<div class="option-holder box">
								<input type="checkbox" name="op_to_contact_me" value="1">
								<h3>Occasion Pros to <br>
								contact me</h3>
								<label for="" class="ease"><i class="fa fa-check" aria-hidden="true"></i></label>
								<img src="{{url('/frontsite/images/option1.png')}}" alt="">
							</div>
							<div class="option-holder box">
								<input type="checkbox" name="search_for_op" value="1">
								<h3>Search For <br>
										Occasion Pros</h3>
								<label for="" class="ease"><i class="fa fa-check" aria-hidden="true"></i></label>
								<img src="{{url('/frontsite/images/option2.png')}}" alt="">
							</div>
							<p><span>Please select an option or</span> you <br> can select both</p>
							<!-- <a href="#" class="trans-btn black-btn">PROCEED</a> -->
							<button href="#" class="trans-btn black-btn">PROCEED</button>
						{!!
							Form::close()
						!!}
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection