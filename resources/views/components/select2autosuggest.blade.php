@section('css_head')
@parent
<link rel="stylesheet" href="{{asset('frontsite/css/lib/select2.min.css')}}">
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered,
    .select2-results__option,
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        color: #000 !important;
        font-size: 14px !important;
    }

    .select2-selection {
        border-radius: 0 !important;
        min-height: 40px !important ;
        padding-top: 5px !important;
    }

    .select2-selection__arrow {
        top: 8px !important;
    }
</style>
@endsection

@section('js_bottom')
@parent
<script src="{{asset('frontsite/js/lib/select2.full.min.js')}}"></script>
<script>
    $(function(){
        var elementSelector = '{{isset($selector) ? $selector : '.select2autosuggest'}}';
        $(elementSelector).each(function(){
            var select2Options = {};
            @if(isset($options) && count($options) > 0)
                @foreach($options as $option_key => $option_value)
                    select2Options['{{$option_key}}'] = '{{$option_value}}';
                    if('placeholder' == '{{$option_key}}'){
                        select2Options['placeholder'] = $(this).attr('placeholder') || $(this).attr('data-placeholder');
                    }
                @endforeach
            @endif
            $(this).select2(select2Options);
        });
    });
</script>
@endsection