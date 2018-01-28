@inject('images', '\App\Services\File\Images')

@extends($bladeToExtend)

@section('meta-title', 'Professionals Profile')

@section('profile-content')
    
    <div class="content-holder">
        <div class="wrapper">
            <div class="bio">
                <h3>Biography/Experience
                    @if($isMyProfileView)
                        <a href="{{route('frontsite.professionals.my-profile.edit')}}" class="f-right edit-link"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                    @endif
                </h3>
                <p>
                    {{$profileInformation['biography']}}
                </p>
            </div>
        </div>
        <div class="clearfix">
            <div class="holder col left-col gen-info f-left">
                <h3>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    General Information 
                    @if($isMyProfileView)
                        <a href="{{route('frontsite.professionals.general-information.edit')}}" class="f-right edit-link"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                    @endif
                </h3>
                <div class="content-c">
                    <ul>
                        @foreach($generalInfoKeysList as $genInfoKey => $genInfoLabel)
                            <li>
                                <h5>{{$genInfoLabel}}</h5>
                                <p>{{$profileInformation[$genInfoKey]}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="holder col right-col f-right">
                <div class="r-holder">
                    <h3>
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        Images
                        <?php $images_count = 0; //$media['images'] = json_decode('');?>
                        @if(isset($media['images']))
                            <?php 
                                $images_count = count($media['images']);
                            ?>
                        @endif
                        @if($isMyProfileView)
                            <a href="{{route('frontsite.professionals.profile.images')}}" class="f-right">See all ({{$images_count}})</a>
                        @else
                            @if($images_count)
                                <a href="#" class="f-right" id="see-all-images" data-target=".img-listing">See all ({{$images_count}})</a>
                            @endif
                        @endif
                    </h3>
                    @if($isMyProfileView)
                        <div class="manage-link">
                            <a href="{{route('frontsite.professionals.profile.images')}}"><i class="fa fa-gear" aria-hidden="true"></i>Add</a>
                            <a href="{{route('frontsite.professionals.profile.images')}}">Delete Images</a>
                        </div>
                    @endif
                    <div class="img-listing">
                        @if(isset($media['images']))
                            @foreach($media['images'] as $i => $image)
                                <div class="img-holder" style="float:left; {{$i >= 9 ? 'display: none;' : ''}}">
                                    <a href="{{$image}}" target="_blank" data-fancybox="images" data-type="image">
                                        <img src="{{$image}}" alt="{{$image}}">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <h4>No images.</h4>
                        @endif
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="r-holder">
                    <h3>
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                        Videos
                        <?php $videos_count = 0; //$media['videos'] = json_decode('');?>
                        @if(isset($media['videos']))
                            <?php 
                                $videos_count = count($media['videos']);
                            ?>
                        @endif
                        @if($isMyProfileView)
                            <a href="{{route('frontsite.professionals.profile.videos')}}" class="f-right">See all ({{$videos_count}})</a>
                        @else
                            @if($videos_count)
                                <a href="#" class="f-right" id="see-all-videos" data-target=".vid-holder">See all ({{$videos_count}})</a>
                            @endif
                        @endif
                    </h3>
                    @if($isMyProfileView)
                        <div class="manage-link">
                            <a href="{{route('frontsite.professionals.profile.videos')}}"><i class="fa fa-gear" aria-hidden="true"></i>Add</a>
                            <a href="{{route('frontsite.professionals.profile.videos')}}">Delete Videos</a>
                        </div>
                    @endif
                    <div class="vid-holder">
                        @if(isset($media['videos']))
                            @foreach($media['videos'] as $j => $video)
                                <?php
                                    if($j > 3) {
                                        break;
                                    }
                                ?>
                                <div class="youtube-holder">
                                    <a href="{{$video}}" target="_blank" data-fancybox="videos" data-type="iframe" class="video_{{$j}}_video-opener"></a>
                                    <span class="video_{{$j}}"></span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if(isset($isDJ) && $isDJ)
                <div class="r-holder">
                    <h3><i class="fa fa-music" aria-hidden="true"></i>
                        Music / Mix <span> (optional)</span>
                    </h3>
                    @if($isMyProfileView)
                        <div class="manage-link">
                            <a href="#"><i class="fa fa-gear" aria-hidden="true"></i>Add</a>
                            <a href="#">Delete Music</a>
                        </div>
                    @endif
                    <br><br><br><br><br>
                </div>
                @endif
                <div class="r-holder">
                    <h3><i class="fa fa-share-alt" aria-hidden="true"></i>
                        Connectivity
                        @if($isMyProfileView)
                            <a href="{{route('frontsite.professionals.profile.connectivity')}}" class="f-right edit-link"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        @endif
                    </h3>
                    <div class="sl" style="word-wrap: break-word;">
                        <ul>
                            <li>
                                <p><i class="fa fa-link" aria-hidden="true" style="color:#345bab;"></i>
                                    Website

                                </p>
                                <a href="{{$media['social_links']['website']}}" target="_blank">{{$media['social_links']['website']}}</a>
                            </li>
                            <li>
                                <p><i class="fa fa-facebook" aria-hidden="true" style="color:#093864;"></i>
                                    Facebook (optional)

                                </p>
                                <a href="{{$media['social_links']['facebook']}}" target="_blank">{{$media['social_links']['facebook']}}</a>
                            </li>
                            <li>
                                <p><i class="fa fa-twitter" aria-hidden="true" style="color:#40b0e4;"></i>
                                    Twitter (optional)

                                </p>
                                <a href="{{$media['social_links']['twitter']}}" target="_blank">{{$media['social_links']['twitter']}}</a>
                            </li>
                            <li>
                                <p><i class="fa fa-pinterest" aria-hidden="true" style="color:#8c1717;"></i>
                                    Pinterest (optional)

                                </p>
                                <a href="{{$media['social_links']['pinterest']}}" target="_blank">{{$media['social_links']['pinterest']}}</a>
                            </li>
                            <li>
                                <p><i class="fa fa-instagram" aria-hidden="true" style="color:#483e28;"></i>
                                    Instagram (optional)

                                </p>
                                <a href="{{$media['social_links']['instagram']}}" target="_blank">{{$media['social_links']['instagram']}}</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="holder col left-col review full-width my-event-detail ">
            <h3>
                <i class="fa fa-star" aria-hidden="true"></i>
                Recent Reviews</h3>
                @include(
                    'frontsite.users.professionals.components.testimonials-listing',
                    [
                        'reviews' => $recentReviews,
                    ]
                )
        </div>
    </div>
@endsection

@section('profile-banner')
    <div class="banner-holder" style="background:url('{{asset('frontsite/images/banner-holder-v.jpg')}}'); background-size:cover;">
        <div class="text-holder clearfix">
            <p class="f-left">MEMBER SINCE {{date('Y', strtotime($profileInformation['created_at']))}}  </p>
            <p class="f-right reviews">
						<span>
                            {{
                                $profileInformation['overall_rating_float']
                            }}
                        </span>
                OVERALL
                @include(
                    'frontsite.partials.ratings',
                    [
                        'rating' => $profileInformation['overall_rating_float']
                    ]
                )
                {{count($recentReviews)}} review(s)
            </p>
        </div>
        <div class="name-holder center-div">
            <h3>{{$user['name']}}</h3>
            <h5>
            <!-- {{
                collect($profileInformation['selected_categories'])->map(function($c){
                    return $c['professional_category'][0]['title'];
                })->implode('/')
            }} -->
            {{$profileInformation['business_name']}}
            <br>
            Serving: {{str_replace(',', ', ', $profileInformation['countries_served'])}}</h5>
            <div class="img-holder">
                <img src="{{$images->getImage('users/'.$user['id'].'/profile_115x115.jpg')}}" alt="">
            </div>
        </div>
    </div>
@endsection

@if($isMyProfileView)
    @section('dashboard-content')
        <div class="content">
            <div class="dash-title clearfix">
                <h3>Profile <!-- <a href="{{route('frontsite.professionals.my-profile.edit')}}" class="f-right edit-link">Edit</a></h3> -->
            </div>
            <div class="profile-v db-prof">
                @yield('profile-banner')
                @yield('profile-content')
            </div>
            @include('components.fancybox')
        </div>
    @endsection
@else
    @section('content')
        <section id="main-wrapper" class="client pro">
            <div class="profile-v">
                @yield('profile-banner')
                @yield('profile-content')
            </div>
        </section>
        @include('components.fancybox')
    @endsection
@endif

@section('js_bottom')
    @parent
    <script src="{{asset('frontsite/js/lib/youtube-url-parser.js')}}"></script>
    <script>
        $(function(){
            $('#see-all-images,#see-all-videos').on('click', function(){
                $($(this).attr('data-target')+' a').first().click();
                return false;
            });

            @if(isset($media['videos']))
                @foreach($media['videos'] as $i => $video)
                    <?php
                        if($i > 3) {
                            break;
                        }
                    ?>
                    var $video = $('.video_{{$i}}'),
                        $iframe_video = createVideo('{{$video}}', 250, 135),
                        $video_opener = $('.video_{{$i}}_video-opener');
                        $video.append(
                            $iframe_video
                        );
                        $video_opener.attr({
                            href: $iframe_video.attr('src')
                        })
                @endforeach
            @endif
        });
    </script>
@endsection
