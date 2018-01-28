@extends('frontsite.layouts.main')

@section('meta-title', 'Professional Profile View')

@section('content')
<section id="main-wrapper" class="client pro">
	<div class="profile-v">
		<div class="banner-holder" style="background:url('{{asset('/frontsite/images/banner-holder-v.jpg')}}'); background-size:cover;">
			<div class="text-holder clearfix">
				<p class="f-left">MEMBER SINCE 2016  </p>
				<p class="f-right reviews">
					<span>5.0</span>
					OVERALL
					<i class="fa fa-star-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
					 3 review(s)
				</p>
			</div>
			<div class="name-holder center-div">
				<h3>John Snowe</h3>
				<h5>DJ, New York</h5>
				<div class="img-holder">
					<img src="{{asset('/frontsite/images/prof-pro.jpg')}}" alt="">
				</div>
			</div>
		</div>
		<div class="content-holder">
			<div class="wrapper">
				<div class="bio">
					<h3>Biography/Experience</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
				</div>
			</div>
			<div class="clearfix">
				<div class="holder col left-col gen-info f-left">
					<h3>
						<i class="fa fa-user" aria-hidden="true"></i>
						General Information</h3>
						<div class="content-c">
							<ul>
								<li>
									<h5>What is your business name?</h5>
									<p>Company Name Goes Right here</p>
								</li>
								<li>
									<h5>What city are you based out of?</h5>
									<p>New York</p>
								</li>
								<li>
									<h5>What distance are you willing to travel?</h5>
									<p>Up to 25 miles</p>
								</li>
								<li>
									<h5>How many years experience?</h5>
									<p>3 year(s)</p>
								</li>
								<li>
									<h5>Do you have liability insurance?</h5>
									<p>Yes</p>
								</li>
								<li>
									<h5>What separates you from other pros?</h5>
									<p>Veri timeam sea ex, quo at docendi ponderum.</p>
								</li>
								<li>
									<h5>Are there any additional services you provide?</h5>
									<p>Act, Dance, Sing</p>
								</li>
								<li>
									<h5>Can you provide references upon request?</h5>
									<p>Yes</p>
								</li>
								<li>
									<h5>Do you require a deposit beforehand?</h5>
									<p>Yes</p>
								</li>
								<li>
									<h5>How far in advance should clients book your services?</h5>
									<p>1 week before</p>
								</li>
								<li>
									<h5>What languages do you speak?</h5>
									<p>English</p>
								</li>
								<li>
									<h5>Do you provide any bi-lingual or cultural services?</h5>
									<p>N/A</p>
								</li>
							</ul>
						</div>
				</div>
				<div class="holder col right-col f-right">
					<div class="r-holder">
						<h3><i class="fa fa-picture-o" aria-hidden="true"></i>
							Images
							<a href="#" class="f-right">See all (8)</a>
						</h3>
						<div class="img-listing">
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
							<div class="img-holder">
								<img src="{{asset('/frontsite/images/i1.jpg')}}" alt="">
							</div>
						</div>
					</div>
					<div class="r-holder">
						<h3><i class="fa fa-youtube-play" aria-hidden="true"></i>
							Videos
							<a href="#" class="f-right">See all (8)</a>
						</h3>
						<div class="vid-holder">
							<a href="#"><img src="{{asset('/frontsite/images/vid.jpg')}}" alt=""></a>
						</div>
					</div>
					<div class="r-holder">
						<h3><i class="fa fa-music" aria-hidden="true"></i>
							Music / Mix <span> (optional)</span>
						</h3>
						<br><br><br><br><br>
					</div>
					<div class="r-holder">
						<h3><i class="fa fa-share-alt" aria-hidden="true"></i>
							Connectivity
							<a href="#" class="f-right">See all (8)</a>
						</h3>
						<div class="sl">
							<ul>
								<li>
									<p><i class="fa fa-link" aria-hidden="true" style="color:#345bab;"></i>
										Website

									</p>
									<a href="#">www.websiteinfo.com</a>
								</li>
								<li>
									<p><i class="fa fa-facebook" aria-hidden="true" style="color:#093864;"></i>
										Facebook (optional)

									</p>
									<a href="#">www.facebook.com/username</a>
								</li>
								<li>
									<p><i class="fa fa-twitter" aria-hidden="true" style="color:#40b0e4;"></i>
										Twitter (optional)

									</p>
									<a href="#">www.twitter.com/username</a>
								</li>
								<li>
									<p><i class="fa fa-pinterest" aria-hidden="true" style="color:#8c1717;"></i>
										Pinterest (optional)

									</p>
									<a href="#">www.pinterest .com/username</a>
								</li>
								<li>
									<p><i class="fa fa-instagram" aria-hidden="true" style="color:#483e28;"></i>
										Instagram (optional)

									</p>
									<a href="#">www.instagram .com/username</a>
								</li>
							</ul>


						</div>
					</div>

				</div>
			</div>

			<div class="holder col left-col review full-width my-event-detail ">
				<h3>
					<i class="fa fa-star" aria-hidden="true"></i>
					Recent Reviews</h3>
					<div class="event-listing pro-listing-detail pro-rating-testi">
						<ul>
							<li></li>
							<li>
								<div class="content col full-width">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/pro-client1.jpg')}}" alt="">
									</div>
									<div class="text-holder ">
										<a>Alexa’s <span style="color:#000000;">Event</span> Accusata complectitur at duo </a>
										<div class="full-content review">
											<div class="review-holder">
												<span>5.0</span>
												<label>OVERALL </label>
												<div class="rating">
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</div>
												<label for="" style="color:#000000; font-size:14px;">$100.00</label>
												<p>Reviewed by Alexa S., LA 10/2/2016</p>
												<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ”</p>
											</div>
										</div>
									</div>
								</div>

								<div class="full-content clearfix">
									<div class="f-left">
										<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">Type Name</a></p>
										<p> <i class="fa fa-calendar" aria-hidden="true"></i>10/30/2016 6:00PM -12:00 PM</p>
										<p> <i class="fa fa-map-marker" aria-hidden="true"></i>Los Angeles, CA</p>
									</div>
									<div class="f-right budg">
									</div>
								</div>
							</li>
							<li>
								<div class="content col full-width">
									<div class="img-holder">
										<img src="{{asset('/frontsite/images/pro-client1.jpg')}}" alt="">
									</div>
									<div class="text-holder ">
										<a>Alexa’s <span style="color:#000000;">Event</span> Accusata complectitur at duo </a>
										<div class="full-content review">
											<div class="review-holder">
												<span>5.0</span>
												<label>OVERALL </label>
												<div class="rating">
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</div>
												<label for="" style="color:#000000; font-size:14px;">$100.00</label>
												<p>Reviewed by Alexa S., LA 10/2/2016</p>
												<p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ”</p>
											</div>
										</div>
									</div>
								</div>

								<div class="full-content clearfix">
									<div class="f-left">
										<p>	<i class="fa fa-id-card-o" aria-hidden="true"></i><a href="#">Type Name</a></p>
										<p> <i class="fa fa-calendar" aria-hidden="true"></i>10/30/2016 6:00PM -12:00 PM</p>
										<p> <i class="fa fa-map-marker" aria-hidden="true"></i>Los Angeles, CA</p>
									</div>
									<div class="f-right budg">
									</div>
								</div>
							</li>
						</ul>
						<a href="#">View more reviews</a>
					</div>

			</div>
		</div>
	</div>
</section>
@endsection