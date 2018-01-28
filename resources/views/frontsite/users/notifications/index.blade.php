@inject('images','\App\Services\File\Images')

@extends($mainDashboard)

@section('meta-title', 'Clients Search')

@section('dashboard-content')
    <style>
        .notifications li {
            padding: 0 !important;
        }

        .notifications .content.col {
            cursor: pointer;
            font-size: 15px;
            max-width: 75%;
            padding: 15px 15px 15px 25px;
        }
        
        .notifications .content a {
            font-size: 14px;
            display: inline;
        }
        
        .notifications .content .fa-bell {
            color: #e59e33;
        }

        .notifications .actions {
            float: right;
            padding: 15px 25px 15px 25px;
        }

        .notifications .full-content {
            padding: 0;
        }

        .notifications .single .content,
        .notifications .single .notif-content {
            background: #e8e8e8;
        }

        .notifications .single.read .content,
        .notifications .single.read .notif-content {
            background: #fff;
        }

    </style>
	<div class="content my-event">
		<div class="dash-title">
			<h3>My Notifications</h3>
		</div>
		<div class="event-listing notifications">
			@if(count($myNotifications))
            <ul>
                <li></li>
                @forelse($myNotifications as $myNotification)
                    <li id="notif-holder-{{$myNotification['id']}}" class="single {{$myNotification['read_at'] ? 'read' : ''}}" data-href="{{route('frontsite.notifications.show',[$myNotification['id']])}}">
                        <div class="notif-content">
                            <div class="content col">
                                <i class="fa fa-bell" aria-hidden="true"></i> &nbsp;
                                {!! $myNotification['data']['message'] !!}
                            </div>
                            <div class="actions">
                                {!!
                                    Form::open([
                                        'url' => route('frontsite.notifications.show',[$myNotification['id']]),
                                        'method' => 'GET',
                                        'class' => 'ajaxify',
                                    ])
                                !!}
                                    <label for="">
                                        <input type="checkbox" name="notif_mark_as_read" value="{{$myNotification['id']}}" class="mark-notif-as-read" {{$myNotification['read_at'] ? 'checked' : ''}}>
                                        Mark as <span id="read-label-{{$myNotification['id']}}">{{$myNotification['read_at'] ? 'unread' : 'read'}}</span>
                                    </label>
                                {!!
                                    Form::close()
                                !!}
                            </div>
                        </div>
                        <div class="full-content clearfix"></div> 
                    </li>
                @empty
                    <li>
                        <div class="content col" style="font-size: 12px;">
                            You don't have notifications.
                        </div>
                    </li>
                @endforelse
            </ul>
            @else
                <div class="no-items">
                    <div class="title-holder">
                        <h3>
                            <!-- <span>404</span> -->
                            Oops! No available notifications.
                        </h3>
                        <hr>
                        <br>
                        <!-- <a href="{{route('frontsite.events.create')}}" class="action-btn btn-yellow">POST YOUR EVENT</a> -->
                    </div>
                </div>
            @endif
			@if(isset($pagination) && count($myNotifications))
                <div class="clearfix res-pag">
                    {!! $pagination !!}
                </div>
            @endif
		</div>
	</div>
@endsection

@section('js_bottom')
    @parent
    <script>
        $(function() {
            // $('.notifications .single').on('click', function(e) {
            //     e.stopImmediatePropagation();
            //     var href = $(this).attr('data-href');
            //         window.location.href = href;
            // });

            var $notificationCount = $('.notifications-count');

            $('.mark-notif-as-read').on('change', function(e) {
                e.preventDefault();
                var $this = $(this),
                    val = $this.val(),
                    isChecked = $this.is(':checked');
                    // optimistic update
                    $('#notif-holder-'+val+',#notif-popup-'+val).toggleClass('read', isChecked);
                    if(isChecked){
                        $('#read-label-'+val).text('unread');
                    }else{
                        $('#read-label-'+val).text('read');
                    }
                    $(this).parents('form').submit();
            });

            $(document).ajaxComplete(function(event, xhr, settings) {
                if(settings.url.indexOf('notifications') > -1){
                    var response = xhr.responseJSON;
                        if(response.success) {
                            // $('#notif-holder-'+response.notificationId).addClass('read');
                            $notificationCount.text(
                                response.unread_notifications.length
                            );
                        }
                }
            });
        });
    </script>
@endsection
