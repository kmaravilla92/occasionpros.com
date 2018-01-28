@section('js_bottom')
    @parent
    <script>
        $(function(){
            $('{{$options['targetInputFile']}}').on({
                change: function(){
                    var $this = $(this),
                        reader = new FileReader();
                        reader.onload = function(e) {
                            $('{{$options['targetImage']}}').attr('src', e.target.result)
                        }
                        reader.readAsDataURL($this[0].files[0]);
                }
            });
        });
    </script>
@endsection
