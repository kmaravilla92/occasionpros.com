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
		<li>
			<p>
				No blog posts available.
			</p>
		</li>
		@endforelse
	</ul>
</div>