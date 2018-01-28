@extends('frontsite.layouts.main')
@section('meta-title', $page['meta_title'])
@section('meta-tags')
<meta name="description" content="{{ $page['meta_description'] }}">
<meta name="keywords" content="{{ $page['meta_keywords'] }}">
@endsection
@section('content')
	<section id="main-wrapper" class="about-page">
		@foreach($html_modules as $html_module)
			{!! $html_module['content'] !!}
		@endforeach
		@include('frontsite.layouts.partials.bottom-contact-link')
	</section>
@endsection