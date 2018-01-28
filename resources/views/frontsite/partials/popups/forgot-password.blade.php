<div id="open-forgot" class="log-in-pop zoom-anim-dialog mfp-hide">
	<div class="title-holder">
		<h3>
			<span>Forgot</span>
			PASSWORD
		</h3>
	</div>
	<div class="form-holder pop-width-375">
		{!!
			Form::open([
				'url'		=>	url('/password/email'),
				'method'	=>	'POST',
				'id'		=>	'user-forgot-password',
				'class'     =>  'ajaxify',
				'data-validation-rules' => 'client_sign_up_rules'
			])
		!!}
			<div class="input-holder forgot-popup">
				<label for="fp-email">Email Address</label>
				<input type="text" name="email" id="fp-email" required>
			</div>
			<input type="submit" name="" class="trans-btn btn-pop-marg btn-b-blue" value="SUBMIT" data-orig-text="SUBMIT">
		{!! Form::close() !!}
	</div>
</div>