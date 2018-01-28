<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>{{config('app.name')}} | @yield('meta-title')</title>
@yield('meta-tags')
<link rel="icon" type="image/png" href="{{asset('/frontsite/images/16x16.png')}}" sizes="16x16">
<link rel="icon" type="image/png" href="{{asset('/frontsite/images/32x32.png')}}" sizes="32x32">
<link rel="icon" type="image/png" href="{{asset('/frontsite/images/96x96.png')}}" sizes="96x96">
<link rel="stylesheet" href="{{asset('/frontsite/css/normalize.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/font-awesome-animation.min.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/flexslider.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('/bower_components/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('/frontsite/css/style.css')}}">
@yield('css_head')
<!--[if lt IE 9]> <script src="asset('/frontsite/js/css3-mediaqueries.js')"></script> <![endif]-->
<script src="{{asset('/frontsite/js/html5.js')}}"></script>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<script>
	window.LaravelCSRFToken = '{{csrf_token()}}';
</script>
@yield('js_head')
</head>
<body rel="home-page">
<section id="main-container" class="{{Request::path()=='/'?'':'inner'}} {{Request::is('*clients*') ? 'client':'client'}} {{Request::is('*professionals*') ? 'pro':''}}">
	@include('frontsite.layouts.header')
	@yield('content')
</section>
@include('frontsite.layouts.footer')
@include('frontsite.partials.popups.login')
@include('frontsite.partials.popups.forgot-password')
@if(isset($currentUser) && config('occ_pros.firebase.enabled'))
	@include('frontsite.components.real-time-notifications', [
		'userId' => $currentUser->id
	])
@endif

@if(Session::get('toastr'))
	@include('components.toastr')
@endif

<script src="{{asset('/bower_components/underscore/underscore-min.js')}}"></script>
<script src="{{asset('/frontsite/js/lib/jquery.min.js')}}"></script>
<script src="{{asset('/frontsite/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('/frontsite/js/lib/jquery-ui.min.js')}}"></script>
<script src="{{asset('/frontsite/js/lib/modernizr-latest.js')}}"></script>
<script src="{{asset('/frontsite/js/jquery.pageslide.js')}}"></script>
<script src="{{asset('/frontsite/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('/bower_components/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('/bower_components/toastr/toastr.min.js')}}"></script>
<script src="{{asset('/frontsite/js/plugins.js')}}"></script>
<script src="{{asset('/frontsite/js/custom.js')}}"></script>
<script src="{{asset('/frontsite/js/forms-validation-rules.js')}}"></script>
<script src="{{asset('/frontsite/js/custom-plugins.js')}}"></script>
<script src="{{asset('/frontsite/js/main-app.js')}}"></script>
<script>
	$(function(){
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': window.LaravelCSRFToken
	        }
	    });
	});

	// home only
	$(window).ready(function(){
		function slideractive(){
			if ($(window).width() < 980) {
			    $('.hex-slide-res').flexslider({
			       animation: "slide",
			       animationLoop: true,
			       slideshow: true,
			       prevText: '',
			       nextText: '',
			       initDelay: 2
			    });
			}
		}
		slideractive();
		if($('.hex-slide-res').hasClass('in-active') == true ){
			$('.hex-slide-res').removeClass('in-active')
		}
		$(window).resize(function(){
		    slideractive();
		});
		// home

		// membership
		function memberactive(){
			if ($(window).width() < 980) {
			    $('.member-list').flexslider({
			       animation: "fade",
			       animationLoop: true,
			       slideshow: false,
			       prevText: '',
			       nextText: '',
			       directionNav: true,
			       sync: '.navigation'
			    });
			    $('.navigation').flexslider({
			        animation: false,
				    controlNav: false,
				    animationLoop: false,
				    directionNav: false,
				    slideshow: false,
			        asNavFor: '.member-list'
			    });
			}
		}
		memberactive();
		
		$(window).resize(function(){
		    memberactive();
		});
		// end membership

		$(function(){
			@if(Session::get('toastr'))
				@foreach(Session::get('toastr') as $key=>$value)
					showToaster('{{$key}}','{!! Session::get('toastr.'.$key) !!}');
				@endforeach
			@endif
		});
	});
</script>
@yield('js_bottom')
</body>
</html>

