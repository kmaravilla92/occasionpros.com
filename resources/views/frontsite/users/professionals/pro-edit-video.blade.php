@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Videos')

@section('dashboard-content')
	<div class="content client-edit-prof pro-edit-prof edit-upload">
		<div class="dash-title clearfix">
			<h3>Edit Videos</h3>
		</div>
		<div class="form-holder">
            {!!
                Form::open([
                    'url' => route('frontsite.professionals.profile.videos.save-videos'),
                    'class' => 'ajaxify'
                ])
            !!}
			<div class="upload-listing">
				<div class="upload-holder">
					<h3>Embedded Video Link <small>( maximum of {{$maxVideos}} videos, <span class="remaining videos">{{$maxVideosRemaining}}</span> remaining. )</small></h3>
					<div class="clearfix">
						<div class="uploaded-holder f-left"></div>
						<div class="uploader-inp f-right">
							<div class="holder" id="video-form" {{$maxVideosRemaining == 0 ? 'disabled' : '' }}>
								<input type="text" name="" value="" id="video-link-main" placeholder="add embed link here" {{$maxVideosRemaining == 0 ? 'disabled' : '' }}>
								<button type="button" class="trans-btn btn-b-blue" id="add-video" {{$maxVideosRemaining == 0 ? 'disabled' : '' }}><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
							</div>
						</div>
					</div>
				</div>
				<div class="upload-holder" id="video-upload-holder">
					<h3>Embedded Video Link</h3>
                    <div class="clearfix video-template" id="video-template" style="display:none;">
                        <div class="uploaded-holder youtube-holder f-left">
                            <a href="#" class="_v"></a>
                            <!-- <img src="images/vid-up.jpg" alt=""> -->
                        </div>
                        <div class="uploader-inp f-right">
                            <div class="holder">
                                <input type="text" name="media[videos][]" value="" class="video-link" placeholder="add embed link here" value="https://youtu.be/CYAUR5eAtgU">
                                <button type="button" class="trans-btn btn-grey delete-video-link"> Delete</button>
                            </div>
                        </div>
                    </div>
                    @forelse($videos as $i => $video)
                    <div class="clearfix video-template video_{{$i}}">
                        <div class="uploaded-holder youtube-holder f-left">
                            <a href="{{$video}}" data-fancybox="videos" data-type="iframe" class="_v"></a>
                            <!-- <img src="images/vid-up.jpg" alt=""> -->
                        </div>
                        <div class="uploader-inp f-right">
                            <div class="holder">
                                <input type="text" name="media[videos][]" value="{{$video}}" class="video-link" placeholder="add embed link here" value="https://youtu.be/CYAUR5eAtgU">
                                <button type="button" class="trans-btn btn-grey delete-video-link"> Delete</button>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
				</div>
			</div>
			<div class="btn">
				<input type="submit" name="" class="trans-btn btn-yellow" value="SAVE AND UPDATE" data-orig-text="SAVE AND UPDATE">
			</div>
            </form>
		</div>

	</div>
    @include('components.fancybox')
@endsection

@section('js_bottom')
	@parent
    <script src="{{asset('frontsite/js/lib/youtube-url-parser.js')}}"></script>
	<script>
		$(function(){
		    var $videoTemplate = $('#video-template'),
                $videoUploadHolder = $('#video-upload-holder'),
                main = {
                    videoLink: $('#video-link-main')
                },
                $videoForm = $('#video-form'),
                $maxVideosRemaining = $('.remaining.videos'),
                TOASTER_ERROR_TYPE = 'error',
                MAX_VIDEOS_COUNT = +'{{$maxVideos}}',
                max_videos_remaining_count = +'{{$maxVideosRemaining}}';

                function increaseMaxVidRemCount(){
                    max_videos_remaining_count += 1;
                }

                function decreaseMaxVidRemCount(){
                    max_videos_remaining_count -= 1;
                }

                function isMaxVidReached(){
                    return max_videos_remaining_count < 0;
                }

                $('#add-video').on({
                    click: function(){
                        var mainVideoLink = main.videoLink.val();
                        var parsedVideoLink = parseVideo(mainVideoLink);
                        if(mainVideoLink==''){
                            showToaster(TOASTER_ERROR_TYPE,'Please enter a Youtube / Vimeo URL');
                            return false;
                        }

                        if(typeof parsedVideoLink.type == 'undefined') {
                            showToaster(TOASTER_ERROR_TYPE,'Please enter a valid Youtube / Vimeo URL');
                            return false;
                        }

                        var $clonedTemplate = $videoTemplate.clone(true),
                            $ifram_video = createVideo(mainVideoLink, 185, 113);
                            $clonedTemplate.find('.video-link').val(mainVideoLink);
                            $clonedTemplate.removeAttr('id');
                            $videoUploadHolder.append(
                                $clonedTemplate.show()
                            );
                            $clonedTemplate.find('.uploaded-holder').append(
                                $ifram_video
                            )
                            $clonedTemplate.find('._v').attr({
                                'href': $ifram_video.attr('src'),
                                'data-fancybox' : 'videos',
                                'data-type': 'iframe'
                            });
                            main.videoLink.val('');

                            decreaseMaxVidRemCount();
                            $(document).trigger('video_managed');
                    }
                });

                $('body').on('click', '.delete-video-link', function(e) {
                    $(e.currentTarget).parents('.video-template').remove();
                    increaseMaxVidRemCount();
                    $(document).trigger('video_managed');
                });

                $(document).on('video_managed', function(e){
                    var _isMaxVidReached = isMaxVidReached();
                    if(_isMaxVidReached){
                        showToaster('info','You reached the limit of allowed videos.');
                    }
                    $maxVideosRemaining.text(max_videos_remaining_count);
                    $videoForm.find('input,button').prop('disabled', _isMaxVidReached); 
                });

                @forelse($videos as $i => $video)
                    var $video = $('.video_{{$i}}'),
                        $_v = $video.find('._v'),
                        $iframe_video = createVideo('{{$video}}', 185, 113);
                        $video.find('.uploaded-holder').append(
                            $iframe_video
                        );
                        $_v.attr({
                            href: $iframe_video.attr('src')
                        });
                @empty
                @endforelse

                /*$('body').on('click', '._v', function(e){
                    var fb_options = [];
                    $('body ._v:visible').each(function(){
                        var href = $(this).attr('href');
                            console.log(href)
                            fb_options.push({
                                src: href,
                                type: 'iframe',
                                options: {}
                            });
                    });
                    $.fancybox.open(fb_options);
                    return false;
                });*/
		});
	</script>
@endsection

@include('components.toastr');