@extends('frontsite.layouts.main')
@section('meta-title', $page['meta_title'])
@section('meta-tags')
<meta name="description" content="{{ $page['meta_description'] }}">
<meta name="keywords" content="{{ $page['meta_keywords'] }}">
@endsection
@section('content')
	<section id="main-wrapper" class="about-page">
		<div class="blue-line"></div>
		<div class="section faq-page">
			<div class="title-holder">
				<h3>
					{{ $page['title'] }}
				</h3>
			</div>
			<div class="text-holder width-920 t-align-l">
				{!! $page['content'] !!}
			</div>
		</div>
	</section>
@endsection