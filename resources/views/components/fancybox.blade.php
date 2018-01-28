@section('css_head')
@parent
<link rel="stylesheet" href="{{asset('frontsite/css/jquery.fancybox.min.css')}}">
@endsection

@section('js_bottom')
@parent
<script src="{{asset('frontsite/js/jquery.fancybox.min.js')}}"></script>
<script>
	$(function(){
		$("body [data-fancybox]").fancybox({
			protect: true,
			touch: null
		});
	});
</script>
@endsection
