@section('js_bottom')
@parent
<!-- TODO: Must moved on a js file -->
<script>
	$(function(){
		var usersRef = firebase.database().ref('users');

		function updateNotificationCount(userId){
			return usersRef
					.child(userId+'/notifications')
					.orderByChild('is_read')
					.equalTo(0)
					.on('value',function(snapshot){
						$('.notifications-count').html(snapshot.numChildren());
					});
		}

		function getNotification(userId){
			var firstTime = true;
			return usersRef
					.child(userId+'/notifications')
					.limitToLast(1)
					.on('child_added',function(snapshot){
						var snapshotVal = snapshot.val();
							if(snapshotVal != null){
								$('.notifications-popup').prepend('<span>'+(snapshotVal.content)+'<span>');
							}
					});
		}

		function openNotification(userId,notificationId){
			$('.notifications-popup span[data-id="'+notificationId+'"]').removeClass('unread');
			return usersRef
					.child(userId+'/notifications')
					.orderByChild('notification_id')
					.equalTo(parseInt(notificationId))
					.limitToLast(1)
					.on('value',function(snapshot){
							if(snapshot != null){
								snapshot.forEach(function(notifSnapshot){
									usersRef.child(userId+'/notifications/'+notifSnapshot.key).update({
										is_read: 1
									}).then(function(){
										// 
									});
								});
							}
					});
		}

		getNotification({{$userId}});
		updateNotificationCount({{$userId}});

		$('.notifications-popup span').on('click',function(e){
			var notificationId = $(e.currentTarget).attr('data-id');
				openNotification({{$userId}}, notificationId);
		})
	});
</script>
@endsection
@include('components.firebase')