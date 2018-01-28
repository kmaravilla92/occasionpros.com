@inject('images', '\App\Services\File\Images')

@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Profile Edit')

@section('dashboard-content')
	<style>
		.pro-categories .select2-selection.select2-selection--multiple {
			border: 1px solid #b6b6b6;
			padding-bottom: 8px;
		}
		.pro-edit-prof ul li.full-width ul.select2-selection__rendered,
		.pro-categories .select2-selection__choice {
			background: #fff !important;
		}
		.pro-categories .select2-selection__choice {
			margin: 3px 3px 0 0 !important;
		    padding: 7px 8px !important;
		    width: auto !important;
		}
		.pro-categories .select2-search.select2-search--inline {
			/*display: none;*/
		}

		.select2-selection.select2-selection--multiple {
			border: 1px solid #b6b6b6;
			padding-bottom: 8px;
		}
		.pro-edit-prof ul li.full-width ul.select2-selection__rendered,
		.select2-selection__choice {
			background: #fff !important;
		}
		.select2-selection__choice {
			margin: 3px 3px 0 0 !important;
		    padding: 7px 8px !important;
		    width: auto !important;
		}
		.select2-search.select2-search--inline {
			/*display: none !important;*/
			margin: 0;
			padding: 0;
		}
		.select2-container--default.select2-container--focus .select2-selection--multiple {
			border: 1px solid #aaa;
		}
	</style>
	<div class="content client-edit-prof pro-edit-prof">
		<div class="dash-title clearfix">
			<h3>Edit Profile Information</h3>
		</div>

		<div class="form-holder">
			{!!
				Form::open([
					'url'		=>	route('frontsite.professionals.my-profile.update'),
					'method'	=>	'POST',
					'class'     =>  'ajaxify',
					'enctype'	=> 	'multipart/form-data',
					'data-validation-rules' => 'professionals_update_profile_rules'
				])
			!!}
				<ul>
					<li>
						<label for="">First Name</label>
						<input type="text" name="profile_information[first_name]" value="{{$profileInformation['first_name']}}">
					</li>
					<li>
						<label for="">Last Name</label>
						<input type="text" name="profile_information[last_name]" value="{{$profileInformation['last_name']}}">
					</li>
					<li class="full-width">
						<p class="header">Categories  <span>( {{$userMembership['title']}} membership - {{$maxCategories}} categories only )</span></p>
						<ul>
							<li class="pro-categories">
								<label for="category"> Category </label>
                                {!!
                                    Form::select(
                                        'profile_information[category][]',
                                        $pro_categories,
                                        $selectedCategoriesIds,
                                        [
                                            'id' 			=> 	'profile_information[category]',
                                            'class' 		=>  'select2autosuggest profile_information_category',
                                            // 'required'		=>	'required',
                                            'placeholder' 	=> 	'-- Select Category --',
                                            'multiple'      =>  'multiple'
                                        ]
                                    )
                                !!}
							</li>
							<li>
								<label for="">Sub Categories Category </label>
								<select class="" name="">
									<option value="">DJs</option>
								</select>
							</li>
						</ul>
					</li>
					<li style="width:100%">
                        <label for="profile_information[countries_served]">Counties Served ( <b><i>Max of 3 Counties</i></b> )</label>
                        {!!
                            Form::select(
                                'profile_information[countries_served][]',
                                $counties,
                                $counties_served,
                                [
                                    'id' 		    => 	'profile_information[countries_served][]',
                                    'class' 		=>  'select2autosuggest profile_information_countries_served',
                                    'multiple' 		=> 	'multiple',
                                    'required'	    =>	'required',
                                    'placeholder' 	=> 	'-- Select Country --'
                                ]
                            )
                        !!}
					</li>
					<li class="full-width">
						<label for="">Biography/Experience</label>
						<textarea name="profile_information[biography]" >{{$profileInformation['biography']}}</textarea>
					</li>
				</ul>
				<div class="upload">
					<p>Upload Profile Image</p>
					<div class="img-holder">
						<img src="{{$images->getImage('users/'.$user['id'].'/profile_115x115.jpg')}}" alt="">
					</div>
					<div class="file-upload">
						<input type="file" name="profile_pic" id="profile_pic">
						<p>Upload Image</p>
					</div>
				</div>
				<div class="btn">
					<input type="submit" name="" class="trans-btn btn-yellow" value="SAVE AND UPDATE" data-orig-text="SAVE AND UPDATE">
				</div>
			</form>
		</div>
	</div>
@endsection

@include('components.select2autosuggest', ['selector'=>'.profile_information_category','options'=>$select2Options])
@include('components.select2autosuggest', ['selector'=>'.profile_information_countries_served','options'=>['maximumSelectionLength'=>3]])
@include('components.filereader', ['options'=>['targetInputFile'=>'#profile_pic','targetImage'=>'.img-holder img']])