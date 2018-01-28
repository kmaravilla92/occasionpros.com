@inject('request','\Illuminate\Http\Request')

@inject('images','\App\Services\File\Images')

@extends('frontsite.users.clients.client-dashboard-main')

@section('meta-title', 'Clients Dashboard')

@section('dashboard-content')
	<div class="content my-event-detail ">
		<div class="dash-title">
			<h3>Write a Review</h3>
		</div>
		<div class="w-review">
			{!!
				Form::open([
					'url' => route('frontsite.clients.reviews.store'),
					'class' => 'ajaxify'
				])
			!!}
				<input type="hidden" name="feedback[event_id]" value="{{$request->input('event_id')}}">
				<input type="hidden" name="feedback[professional_id]" value="{{$request->input('professional_id')}}">
				<div class="review">
					<h3>{{$eventPost->title}} </h3>
					<p>Rate the Professional (1-5 Star)</p>
					<ul>
						<li>
							<label for="">Quality of Service</label>
							<div class="star-holder">
								<input type="radio" name="feedback[qos]" value="1" checked>
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[qos]" value="2">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[qos]" value="3">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[qos]" value="4">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[qos]" value="5">
								<!-- <span class="ease"></span> -->
							</div>
						</li>
						<li>
							<label for="">Professionalism</label>
							<div class="star-holder">
								<input type="radio" name="feedback[psm]" value="1" checked>
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[psm]" value="2">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[psm]" value="3">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[psm]" value="4">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[psm]" value="5">
								<!-- <span class="ease"></span> -->
							</div>
						</li>
						<li>
							<label for="">Value</label>
							<div class="star-holder">
								<input type="radio" name="feedback[val]" value="1" checked>
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[val]" value="2">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[val]" value="3">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[val]" value="4">
								<!-- <span class="ease"></span> -->
							</div>
							<div class="star-holder">
								<input type="radio" name="feedback[val]" value="5">
								<!-- <span class="ease"></span> -->
							</div>
						</li>
						<!-- <li>
							<label for="">Recommend</label>
							<div class="rec">
								<ul>
									<li>
										<div class="checkbox">
												<input type="checkbox" name="yes" value="">
												<span></span>
										</div>
										<label for="yes"> Yes</label>
									</li>
									<li>
										<div class="checkbox">
												<input type="checkbox" name="yes" value="">
												<span></span>
										</div>
										<label for="no"> No</label>
									</li>
								</ul>
							</div>

						</li> -->
					</ul>
				</div>
				<div class="pro-details">
					<div class="left-content">
						<div class="bid-img">
							<div class="img-holder">
								<img src="{{$images->getImage('users/'.$user['id'].'/profile_115x115.jpg')}}" class="center-div" alt="">
							</div>
							<a href="{{route('frontsite.professionals.profile',[$user['id']])}}" target="_blank">View Profile</a>
						</div>
						<div class="bid-content">
							<a href="{{route('frontsite.professionals.profile',[$user['id']])}}" target="_blank">{{$user['name']}}</a>
							<p>
								{{
					                collect($profileInformation['selected_categories'])->map(function($c){
					                    return $c['professional_category'][0]['title'];
					                })->implode('/')
					            }}
				            </p>
							<p>	{{$profileInformation['location']}},{{$profileInformation['countries_served']}}</p>
							<p> 
							{{
								calculate_distance(
					                $profileInformation['latitude'],
					                $profileInformation['longitude'],
					                $current_user_profile_information['latitude'],
					                $current_user_profile_information['longitude'],
					                'M'
					            )
							}}
							miles from location</p>
						</div>
					</div>
				</div>
				<div class="full-width form-holder feedback">
				<ul class="full-width">
					<li >
						<label for="">Feedback</label>
						<textarea name="feedback[feedback]" required></textarea>
						<span class="f-right"><span class="feedback-word-counter">250</span> Words</span>
						<div class="clearfix"></div>
					</li>
				</ul>
				<div class="btn-holder">
					<input type="submit" class="btn-yellow" data-orig-text="SUBMIT REVIEW" value="SUBMIT REVIEW">
				</div>
			</div>
			</form>
		</div>
	</div>
@endsection

@section('js_bottom')
	<script>
		$(function(){
			var MAX_WORD_COUNT = 250,
				$feedbackWordCounter = $('.feedback-word-counter');
				$('textarea').on('keyup',function(){
					var value = $(this).val(),
						words = value.match(/\S+/g);

						if(words != null){
							var wordsCount = words.length;
							if(wordsCount > MAX_WORD_COUNT){
								// Split the string on first 200 words and rejoin on spaces
								var trimmed = $(this).val().split(/\s+/, MAX_WORD_COUNT).join(" ");
								// Add a space at the end to keep new typing making new words
								$(this).val(trimmed + " ");
							}else{
								$feedbackWordCounter.html( MAX_WORD_COUNT - wordsCount );
							}
						}
				}).trigger('keyup');

			// $('.star-holder [type="checkbox"]').on('click',function(){
			// 	var $this = $(this);
			// 	var value = $this.val();
			// 	var $parent = $this.parents('li');
			// 	if($this.is(':checked')){
			// 		for(var i = value; i > 0; i--){
			// 			$parent.find('[value="'+i+'"]').prop('checked', true);
			// 			console.log($parent.find('[value="'+i+'"]').val());
			// 		}
			// 	}else{
			// 		for(var i = value-1; i > 0; i--){
			// 			$parent.find('[value="'+i+'"]').prop('checked', false);
			// 		}
			// 	}
			// });
		});
	</script>
@endsection
