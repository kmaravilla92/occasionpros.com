<footer class="page-footer">
	<div class="top-footer">
		<div class="wrapper">
			<div class="quick-links top-cont">
				<h3>Quick Links</h3>
				<hr>
				<div class="link-holder customer">
					<ul>
						<li><a href="{{route('frontsite.home')}}">Home</a></li>
						<li><a href="{{route('frontsite.sign-up')}}">Sign up</a></li>
						<li><a href="{{route('frontsite.about-us')}}">About</a></li>
						<li><a href="{{route('frontsite.faq')}}">FAQs</a></li>
						<li><a href="{{route('frontsite.how-it-works')}}">How it Works</a></li>
						<li><a href="{{route('frontsite.privacy-policy')}}">Privacy Policy</a></li>
						<li><a href="{{route('frontsite.clients.search')}}">Find Talent</a></li>
						<li><a href="{{route('frontsite.terms-of-use')}}">Terms of use</a></li>
						<li><a href="{{route('frontsite.contact-us')}}">Contact</a></li>
					</ul>
				</div>
				<div class="link-holder op">
					<h4>Latest Blog</h4>
					@if(count($recent_blog_posts))
					<ul>
						@foreach($recent_blog_posts as $recent_blog_post)
						<li>
							<a href="/blog-posts/{{$recent_blog_post->slug}}">{{$recent_blog_post->title}}</a>
						</li>
						@endforeach
					</ul>
					@else
					<p>No available posts</p>
					@endif
				</div>
			</div>
			<div class="contact top-cont">
				<h3>Contact Us</h3>
				<hr>
				<ul>
					<li class="clearfix">
						<h3 class="f-left">Phone:</h3>
						<div class="f-right">
							<p>+440 875369208 <span style="color:#636363;">- Office</span></p>
							<p>+440 353363114 <span style="color:#636363;">- Fax</span></p>
						</div>
					</li>
					<li class="clearfix">
						<h3 class="f-left">Email:</h3>
						<div class="f-right">
							<a href="mailto:joel@occasionpros.com">joel@occasionpros.com</a>
							<a href="mailto:info@occasionpros.com">info@occasionpros.com</a>
						</div>
					</li>
					<li class="clearfix">
						<h3 class="f-left">Follow:</h3>
						<div class="f-right">
							<a href="https://www.facebook.com/occasionpros/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/occasionpros/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="wrapper clearfix">
			<div class="dib">
				<p>Copyright &copy; {{date('Y')}} occasionpros All Rights Reserved.</p>
			</div>
			<div class="f-right footer-menu">
				<a href="{{route('frontsite.privacy-policy')}}"><p>Privacy Policy</p></a>|
				<a href="{{route('frontsite.terms-of-use')}}"><p>Terms of Use</p></a>
			</div>
		</div>
	</div>
</footer>
