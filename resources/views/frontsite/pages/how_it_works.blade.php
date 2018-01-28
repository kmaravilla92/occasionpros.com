@extends('frontsite.layouts.main')
@section('meta-title', $page['meta_title'])
@section('meta-tags')
<meta name="description" content="{{ $page['meta_description'] }}">
<meta name="keywords" content="{{ $page['meta_keywords'] }}">
@endsection
@section('content')
	<section id="main-wrapper" class="hiw-page">
		@foreach($html_modules as $html_module)
			{!! $html_module['content'] !!}
		@endforeach
		<!-- <div class="section banner-holder clearfix">
			<div class="wrapper">
				<div class="f-left half-width">
					<div class="title-holder middle-div">
						<h4>
							<span>How</span>
							it works
						</h4>
						<hr>
						<p>Occasion Pros is a simple concept.<br>
							Here’s how it works:</p>
					</div>
				</div>
				<div class="f-right half-width">
					<div class="img-holder hori-div">
						<img src="frontsite/images/how-img.png" alt="">
					</div>
				</div>
			</div>
		</div> -->
		<!-- <div class="how-section clearfix box" style="background:#3a94d8;">
			<div class="wrapper">
				<div class="img-holder box half-width left-content f-left">
					<img src="frontsite/images/works1.png" alt="">
				</div>
				<div class="content-holder box half-width right-content f-right">
					<div class="clearfix">
						<label for="" class="f-left" style="color:#214764;">1</label>
						<h3 class="f-left">Get <br>
						free <br> quotes </h3>
					</div>
					<h4>Or search the site for <br> Occasion Pros</h4>
					<p>With thousands of talented and vetted event professionals on Occasion Pros, you’re bound to find an entertainer or service to take your event to another level.  Submit your request free of charge and receive bids from our talented event professionals or search our database to connect to as many professionals as you like.  An event professional will send you a price quote or message you to work out the details.</p>
				</div>
			</div>
		</div> -->
		<!-- <div class="how-section clearfix box" style="background:#4d4e89;">
			<div class="wrapper">
				<div class="content-holder box half-width left-content f-left">
					<div class="clearfix">
						<label for="" class="f-left" style="color:#252541;">2</label>
						<h3 class="f-left"> Book <br>
							Online <br> Confidently
					</div>
					<p>If everything looks good with your quote, you’re ready to book. Just enter your payment and that’s it… you’re done! We’ve designed it all to be super easy, iron-clad secure, and lightning fast. You do not pay a fee to Occasion Pros. All you pay is the amount you have agreed to with the vendor.</p>
				</div>
				<div class="img-holder box half-width right-content f-right">
					<img src="frontsite/images/works1.png" alt="">
				</div>
			</div>
		</div> -->
		<!-- <div class="how-section clearfix box" style="background:#eca944;">
			<div class="wrapper">
				<div class="img-holder box half-width left-content f-left">
					<img src="frontsite/images/works1.png" alt="">
				</div>
				<div class="content-holder box half-width right-content f-right">
					<div class="clearfix">
						<label for="" class="f-left" style="color:#82602c;">3</label>
						<h3 class="f-left">Enjoy <br>
						Your <br> Event </h3>
					</div>
					<p>Congratulations and great job on your decision to create a meaningful event by booking top-notch talent. Your guests will appreciate the awesomeness that only quality entertainment and Occasion Pros can provide!</p>
				</div>
			</div>
		</div> -->
		@include('frontsite.layouts.partials.bottom-contact-link')
	</section>
@endsection