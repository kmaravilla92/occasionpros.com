<div class="recent-holder">
	<h3>RECENT POST</h3>
	<hr>
	<ul>
		@forelse($recent_blog_posts as $recent_blog_post)
		<li>
			<a href="{{route('frontsite.blog-posts-slug',['slug'=>$recent_blog_post->slug])}}">
				{{$recent_blog_post->title}}
			</a>
		</li>
		@empty
		@endforelse
		<!-- <li><a href="#">consectetur adipisicing elit, sed do</a></li>
		<li><a href="#">eiusmod tempor incididunt ut </a></li>
		<li><a href="#">labore et dolore magna aliqua. Ut </a></li>
		<li><a href="#">enim ad minim veniam, quis </a></li>
		<li><a href="#">nostrud exercitation ullamco </a></li>
		<li><a href="#">laboris nisi ut aliquip ex ea </a></li> -->
	</ul>
</div>