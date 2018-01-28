@inject('images', '\App\Services\File\Images')

<div class="drop user-not">																
				
	<a href="#"><i class="fa fa-bell" aria-hidden="true"></i> <span class="notifications-count">{{$userNotificationsCount}}</span></a>												
	<div class="register-drop notifications-popup" >										
	
		<div class="pop-arrow">								
			<img src="{{asset('/frontsite/images/arrow-up.png')}}" alt="">							
		</div>							
		
		@forelse($userNotifications as $i => $userNotification)
			<span 
				id="notif-popup-{{$userNotification->id}}"
				class="{!! $userNotification->read_at ? 'read' : '' !!}" 
				data-id="{{$userNotification->id}}" {!!$i > 4 ? 'style="display: none;"' : ''!!}
				onclick="window.location.href='{{route('frontsite.notifications.show',['id'=>$userNotification->id])}}'">					
				<div class="not-img">									
					<img src="{{$images->getImage('users/'.(isset($userNotification->data['from_user']['id']) ? $userNotification->data['from_user']['id'] : 0).'/profile_115x115.jpg')}}" alt="">
				</div>								
				<div class="not-text">	
					{!! $userNotification->data['excerpt'] !!}						
				</div>	
				<span class="clearfix"></span>						
			</span>	

			@if($i == 4)
				<span style="padding:0;">
					<a href="{{route('frontsite.notifications')}}" style="display:block;padding:10px 20px;">See all notifications.</a>
				</span>
			@endif
		@empty
			<span>You don't have notifications.</span>
		@endforelse												
	</div>		
</div>