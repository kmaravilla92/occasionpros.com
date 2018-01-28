@inject('latest_events','\App\Components\LatestTalents')
@extends('frontsite.layouts.main')
@section('meta-title', $page['meta_title'])
@section('meta-tags')
<meta name="description" content="{{ $page['meta_description'] }}">
<meta name="keywords" content="{{ $page['meta_keywords'] }}">
@endsection
@section('content')
	<section id="main-wrapper" class="home">
		{!! $html_modules[12]['content'] !!}
		<!-- <div class="banner-holder home-over bg fullscreen" style="background-image:url('frontsite/images/banner.jpg');" data-img-width="1440" data-img-height="736">
			<div class="wrapper">
				<div class="content-holder center-div">
					<div class="title-holder">
						<h3><span>Connecting People</span>with the best <br>
						event professionals <br>
						in the world.</h3>
						<hr>
					</div>
					<div class="links-holder">
						<div class="hex-slide-res in-active">
							<ul class="slides">
								<li>
									<div class="hexagon-holder">
										<div class="hexagon center-div"></div>
										<div class="text-holder center-div">
											<h2>Post</h2>
											<p class="light-blue">YOUR</p>
											<p class="dark-blue">EVENT</p>
											<a href="{{route('frontsite.events.create')}}"><img src="/frontsite/images/banner-btn.png" alt=""></a>
											<label for="">It’s FREE! Get quotes <br> now from OPs!</label>
										</div>
									</div>
								</li>
								<li>
									<div class="hexagon-holder">
										<div class="hexagon center-div"></div>
										<div class="text-holder center-div">
											<h2>Search</h2>
											<p class="light-blue">FIND</p>
											<p class="dark-blue">TALENT</p>
											<a href="{{route('frontsite.clients.search.options')}}"><img src="/frontsite/images/banner-btn.png" alt=""></a>
											<label for="">Search our database & <br>connect with OPs NOW!</label>
										</div>
									</div>
								</li>
								<li>
									<div class="hexagon-holder">
										<div class="hexagon center-div"></div>
										<div class="text-holder center-div">
											<h2>Register</h2>
											<p class="light-blue">PRO</p>
											<p class="dark-blue">SIGN-UP</p>
											<a href="{{route('frontsite.professionals.sign-up')}}"><img src="/frontsite/images/banner-btn.png" alt=""></a>
											<label for="">Sign-Up Now & Get Bronze <br> Package for 2 Months FREE!</label>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="scroll">
					<a href="#how-toggle"><img src="/frontsite/images/scroll-down.png" alt=""></a>
				</div>
			</div>
		</div> -->
		{!! $html_modules[10]['content'] !!}
		<!-- <div class="how-it-works clearfix" id="how-toggle">
			<div class="half-width f-left main-cont left-bg">
			</div>
			<div class="half-width f-right main-cont right-bg">
			</div>
			<div class="content-holder hori-div">
				<div class="title-holder">
					<h3>
						<span>Simple 6 steps on</span>
						HOW IT WORKS
					</h3>
					<hr>
				</div>
				<div class="column col1">
					<ul>
						<li>
							<div class="clearfix">
								<img class="f-right" src="/frontsite/images/how1.png" alt="">
								<h3 class="f-right">Get Free Quotes</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
						<li>
							<div class="clearfix">
								<img class="f-right" src="/frontsite/images/how2.png" alt="">
								<h3 class="f-right">Talk with <br> event professional </h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
						<li>
							<div class="clearfix">
								<img class="f-right" src="/frontsite/images/how3.png" alt="">
								<h3 class="f-right">Book Online <br> Confidently</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
					</ul>
				</div>
				<div class="column col2">
					<img src="/frontsite/images/how-laptop.png" alt="">
				</div>
				<div class="column col3">
					<ul>
						<li>
							<div class="clearfix">
								<img class="f-left" src="/frontsite/images/how4.png" alt="">
								<h3 class="f-left">Pay Vendor</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
						<li>
							<div class="clearfix">
								<img class="f-left" src="/frontsite/images/how5.png" alt="">
								<h3 class="f-left">Enjoy your event </h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
						<li>
							<div class="clearfix">
								<img class="f-left" src="/frontsite/images/how6.png" alt="">
								<h3 class="f-left">Rate Vendor</h3>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
						</li>
					</ul>
				</div>
				<div class="read-more">
					<p>Read more about how it works</p>
					<a href="{{route('frontsite.how-it-works')}}" class="trans-btn white-btn">READ MORE</a>
				</div>
			</div>
		</div> -->
		{!! $html_modules[13]['content'] !!}
		<!-- <div class="pro-signup" >
			<div class="pro-banner" style="background:url(/frontsite/images/pro-banner.jpg);">
			</div>
			<div class="pro-container">
				<div class="pro-holder">
					<img src="/frontsite/images/pro1.png" alt="">
					<div class="content-holder hori-div">
						<h3>EVENT <br> SERVICES</h3>
					</div>
				</div>
				<div class="pro-holder">
					<img src="/frontsite/images/pro2.png" alt="">
					<div class="content-holder hori-div">
						<h3>MUSICAL <br> ENTERTAINMENT</h3>
					</div>
				</div>
				<div class="pro-holder">
					<img src="/frontsite/images/pro3.png" alt="">
					<div class="content-holder hori-div">
						<h3>PERFORMERS</h3>
					</div>
				</div>
				<div class="pro-holder">
					<img src="/frontsite/images/pro4.png" alt="">
					<div class="content-holder hori-div">
						<h3>TRANSPORTATION</h3>
					</div>
				</div>
				<div class="pro-holder">
					<img src="/frontsite/images/pro5.png" alt="">
					<div class="content-holder hori-div">
						<h3>PARTY RENTAL</h3>
					</div>
				</div>
			</div>
			<div class="text-cont">
				<p>Are you a professional looking for new customers?</p>
				<a href="{{route('frontsite.professionals.sign-up')}}" class="b trans-btn blue-btn">SIGN UP NOW!</a>
			</div>
		</div> -->
		{!! $html_modules[11]['content'] !!}
		<!-- <div class="about-holder section">
			<div class="title-holder">
				<h3>
					<span>Who we are!</span>
					ABOUT US
				</h3>
				<hr>
			</div>
			<div class="content-holder">
				<h5>Occasion Pros is your one-stop site for connecting clients with the <br> best and talented event professionals in the US.</h5>
				<p>OP has the ease and convenience to matched the quality and <br> reputation you receive when using an event planner.</p>
				<a href="{{route('frontsite.about-us')}}" class="trans-btn">READ MORE</a>
			</div>
		</div> -->
		{!! $html_modules[14]['content'] !!}
		<div class="latest-blog box" style="background:url(frontsite/images/latest-blog.jpg);">
			<div class="wrapper">
				<div class="clearfix">
					@foreach($latest_blog_posts as $index => $latest_blog_post)
						@if($index == 0)
							<div class="col col-holder2 f-right">
								<div class="title-blog box">
									<h3><span>Latest</span>
										Blog & events
									</h3>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
								</div>
								<div class="full-width blog-holder">
									<div class="hover ease"></div>
									<img src="{{$latest_blog_post->featured_image}}" alt="{{$latest_blog_post->featured_image}}" class="main-ig">
									<img src="/frontsite/images/top-blog.png"  class="over-grad" alt="">
									<a href="{{route('frontsite.blog-posts-slug',['slug'=>$latest_blog_post->slug])}}" class="text-holder box">
										<h3>{{$latest_blog_post->title}}</h3>
										<p>{{date('d M Y',strtotime($latest_blog_post->created_at))}}, Posted by ADMIN</p>
										<hr>
									</a>
								</div>
							</div>
						@endif
						@if($index == 1)
							<div class="col col-holder1 f-left">
						@endif
							@if($index == 1)
								<div class="full-width blog-holder">
									<div class="hover ease"></div>
									<img src="{{$latest_blog_post->featured_image}}" alt="{{$latest_blog_post->featured_image}}">
									<img src="/frontsite/images/top-blog.png"  class="over-grad" alt="">
									<a href="{{route('frontsite.blog-posts-slug',['slug'=>$latest_blog_post->slug])}}" class="text-holder box">
										<h3>{{$latest_blog_post->title}}</h3>
										<p>{{date('d M Y',strtotime($latest_blog_post->created_at))}}, Posted by ADMIN</p>
										<hr>
									</a>
								</div>
							@endif
							@if($index == 2)
							<div class="sixty-width f-left bottom-blog blog-holder">
								<div class="hover ease">	</div>
								<img src="{{$latest_blog_post->featured_image}}" alt="{{$latest_blog_post->featured_image}}">
								<img src="/frontsite/images/top-blog.png"  class="over-grad" alt="">
								<a href="{{route('frontsite.blog-posts-slug',['slug'=>$latest_blog_post->slug])}}" class="text-holder box">
									<h3>{{$latest_blog_post->title}}</h3>
									<p>{{date('d M Y',strtotime($latest_blog_post->created_at))}}, Posted by ADMIN</p>
									<hr>
								</a>
							</div>
							@endif
							@if($index == 3)
							<div class="forty-width f-left bottom-blog  blog-holder">
								<div class="hover ease"></div>
								<img src="{{$latest_blog_post->featured_image}}" alt="{{$latest_blog_post->featured_image}}">
								<img src="/frontsite/images/top-blog.png"  class="over-grad" alt="">
								<a href="{{route('frontsite.blog-posts-slug',['slug'=>$latest_blog_post->slug])}}" class="text-holder box">
									<h3>{{$latest_blog_post->title}}</h3>
									<p>{{date('d M Y',strtotime($latest_blog_post->created_at))}}, Posted by ADMIN</p>
									<hr>
								</a>
							</div>
							@endif
						@if($index == (count($latest_blog_posts) - 1))			
							</div>
						@endif
					@endforeach
				</div>
				<div class="btn-holder">
					<a href="{{route('frontsite.blog-posts')}}" class="trans-btn orange-btn">READ ALL POSTS</a>
				</div>
			</div>
		</div>
		<div class="section newsletter">
			<div class="newsletter-holder" style="background:url(frontsite/images/newsletter-bg.jpg);">
				<div class="content-holder box">
					<h3>Subscribe to <br>
						our latest Updates</h3>
				<div class="form-holder">
                    {!!
                        Form::open([
                            'url'		=>	route('newsletter.subscribe'),
                            'method'	=>	'POST',
                            'id'		=>	'newsletter-subscribe',
                            'class'     =>  'ajaxify',
                            'data-validation-rules' => 'newsletter_subscribe'
                        ])
                    !!}
						<input type="email" placeholder="Enter email address" name="nl-email" id="nl-email" value="" required>
						<input type="submit" value="SUBMIT">
					{!! Form::close() !!}
				</div>
				</div>
			</div>
		</div>
	</section>
@endsection