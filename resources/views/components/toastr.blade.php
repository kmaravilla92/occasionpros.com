@section('css_head')
    @parent
    <link rel="stylesheet" href="{{asset('bower_components/toastr/toastr.min.css')}}">
@endsection

@section('js_bottom')
    @parent
    <script src="{{asset('bower_components/toastr/toastr.min.js')}}"></script>
    <script>
        toastr.options = {
           "closeButton": true,
           "debug": false,
           "newestOnTop": true,
           "progressBar": false,
           "positionClass": "toast-top-right",
           "preventDuplicates": false,
           "onclick": null,
           "tapToDismiss": false,
           "showDuration": "0",
           "hideDuration": "0",
           "timeOut": "0",
           "extendedTimeOut": "0",
           "showEasing": "swing",
           "hideEasing": "linear",
           "showMethod": "fadeIn",
           "hideMethod": "fadeOut"
        };

        function showToaster(type, message) {
            console.log(toastr.options);
            toastr[type](message);
        }
    </script>
@endsection
