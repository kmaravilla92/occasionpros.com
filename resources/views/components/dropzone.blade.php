@section('css_head')
    @parent
    <link rel="stylesheet" href="{{asset('bower_components/dropzone/dist/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/dropzone/dist/min/basic.min.css')}}">
    <style>
        .dz-max-files-reached {background-color: red};
    </style>
@endsection

@section('js_bottom')
    @parent
    <script src="{{asset('bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>
    <script>
        $(function(){
            Dropzone.autoDiscover = false;

            var acceptedFiles = '{{isset($options['accepted_files']) ? $options['accepted_files'] : '*'}}',
                imageIdIncr = $('[name="files[]"]').length,
                $imagesPreview = $('#images-preview'),
                $maxImagesRemaining = $('.remaining.images'),
                MAX_FILE_SIZE = 2,
                MAX_FILES_COUNT = {{isset($options['max_files_count']) ? $options['max_files_count'] : 1}},
                MAX_FILES_COUNT_REMAINING = {{isset($options['max_files_remaining']) ? $options['max_files_remaining'] : 1}},
                max_videos_remaining_count = MAX_FILES_COUNT_REMAINING,
                myDropzone,
                $myDropzone;

                function isMaxImagesReached(){
                    return max_videos_remaining_count == 0;
                }

                $myDropzone = $("{{$options['selector']}}").dropzone({
                    url: "{{$options['url']}}",
                    clickable: true,
                    acceptedFiles: acceptedFiles,
                    maxFiles: MAX_FILES_COUNT_REMAINING,
                    maxFilesize: MAX_FILE_SIZE,
                    success: function(file, xhr, formData) {
                        $('#save-images').append(
                            '<input type="hidden" name="files[]" value="'+xhr.tempUrl+'" class="hidden_file_'+imageIdIncr+'"/>'
                        );
                        $imagesPreview.append(
                            '<div class="img-holder '+imageIdIncr+'">'+
                                '<a href="'+xhr.fullUrl+'" target="_blank" data-fancybox="images" data-type="image" class="_i">'+
                                    '<img src="'+xhr.fullUrl+'" alt="'+xhr.fullUrl+'">'+
                                '</a>'+
                                '<button class="trans-btn btn-grey delete-attachment" data-id="'+imageIdIncr+'"> Delete</button>'+
                            '</div>'
                        );
                        imageIdIncr += 1;
                        max_videos_remaining_count -= 1;
                        $('#add-image').prop('disabled', imageIdIncr == MAX_FILES_COUNT);
                        $(document).trigger('video_managed');
                    },
                    init: function(){
                        myDropzone = this;
                        this.on("maxfilesexceeded", function(file){
                            showToaster('error', 'You can only upload up to maximum of '+MAX_FILES_COUNT+' photo/s');
                        });
                        this.on('error', function(file){
                            if(!file.accepted){
                                showToaster('error', 'Invalid file selection.');
                            }
                        });
                    }
                });

                $('body').on('click', '.delete-attachment', function() {
                    var id = $(this).attr('data-id');
                        $('.img-holder.'+id+',.hidden_file_'+id).remove();
                        $('#add-image').prop('disabled', false);
                        // imageIdIncr -= 1;
                        max_videos_remaining_count += 1;
                        myDropzone.options.maxFiles = MAX_FILES_COUNT_REMAINING += 1;
                        $(document).trigger('video_managed');
                });

                $(document).on('video_managed', function(e){
                    var _isMaxImagesReached = isMaxImagesReached();
                    if(_isMaxImagesReached){
                        showToaster('info','You reached the limit of allowed videos.');
                    }
                    $maxImagesRemaining.text(max_videos_remaining_count);
                });
        });
    </script>
@endsection