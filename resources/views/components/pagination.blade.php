@section('css_head')
@parent
<link rel="stylesheet" type="text/css" href="{{asset('bower_components/paginationjs/dist/pagination.css')}}">
@endsection

@section('js_bottom')
@parent
<script type="text/javascript" charset="utf8" src="{{asset('bower_components/paginationjs/dist/pagination.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.pagination-container').pagination({
            dataSource: JSON.parse('{{$options["data"]}}'),
            pageSize: 5
        })
    });
</script>
@endsection
