@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Profile Images')

@section('dashboard-content')
	<div class="content client-edit-prof pro-edit-prof edit-upload">
		<div class="dash-title clearfix">
			<h3>Edit Images</h3>
		</div>
		<div class="form-holder">
			<div class="upload-listing">
				<div class="upload-holder">
					<h3>Attach/Drop Images <small>( maximum of {{$dropzoneOptions['max_files_count']}} photos, <span class="remaining images">{{$dropzoneOptions['max_files_remaining']}}</span> remaining. )</small></h3>
					<div class="clearfix">
                        <div class="uploader-inp img full-width">
                            <form action="{{route('frontsite.professionals.profile.images.upload')}}" id="dropfile-zone" class="dropzone" style="display: none;">
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                            <button class="center-div trans-btn btn-b-blue" id="add-image" {{0 == $dropzoneOptions['max_files_remaining'] ? 'disabled="disabled"' : ''}}><i class="fa fa-plus" aria-hidden="true" ></i> Add Image/s</button>
                        </div>
					</div>
				</div>
			</div>
			<div class="img-uploaded" id="images-preview">
                @forelse($images as $i => $image)
                    <div class="img-holder {{$i}}">
                        <a href="{{$image}}" target="_blank" data-fancybox="images" data-type="image" class="_i">
                            <img src="{{$image}}" alt="{{$image}}">
                        </a>
                        <button class="trans-btn btn-grey delete-attachment" data-id="{{$i}}"> Delete</button>
                    </div>
                @empty
                @endforelse
            </div>
			<div class="btn">
                {!!
                    Form::open([
                        'url'   => route('frontsite.professionals.profile.images.save-images'),
                        'id'    => 'save-images',
                        'class' => 'ajaxify'
                    ])
                !!}
                    @forelse($images as $i => $image)
                    <input type="hidden" name="files[]" value="{{$image}}" class="hidden_file_{{$i}}"/>
                    @empty
                    @endforelse
                    <input type="submit" name="" class="trans-btn btn-yellow" value="SAVE AND UPDATE" data-orig-text="SAVE AND UPDATE">
                </form>
			</div>
		</div>
	</div>
    @include('components.fancybox')
@endsection

@include('components.dropzone', ['options' => $dropzoneOptions])
@include('components.toastr', [])

@section('js_bottom')
    @parent
    <script>
        $(function(){
            $('#add-image').on('click', function() {
                $('#dropfile-zone').click();
            });

            /*$('body').on('click', '._i', function(e){
                var fb_options = [];
                $('body ._i:visible').each(function(){
                    var href = $(this).attr('href');
                        fb_options.push({
                            src: href,
                            type: 'image',
                            options: {}
                        });
                });
                $.fancybox.open(fb_options);
                return false;
            });*/
        });
    </script>
@endsection