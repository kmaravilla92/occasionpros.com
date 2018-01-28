<div class="log-link">
    <p class="or">OR</p>
    @if($login_fb_user_type != 'unidentified')
		<p>If you already have an Account</p>
	    <h3>Please <a class="log-in popup-with-zoom-anim" href="#open-login">login</a></h3>
	    <a href="#open-forgot" class="popup-with-zoom-anim">Forgot your password?</a>
    @endif
    <a href="{{route('auth.social.set-info',['facebook',$login_fb_user_type])}}" class="fb-login"><img src="{{asset('/frontsite/images/fb-login.png')}}" alt=""></a>
    @if($login_fb_user_type != 'unidentified')
    	<p>We won't post on your wall without <br> your permission.</p>
    @endif
</div>
