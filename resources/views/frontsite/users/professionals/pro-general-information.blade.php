@extends('frontsite.users.professionals.pro-dashboard-main')

@section('meta-title', 'Professionals Notifications')

@section('dashboard-content')
	<div class="content">
		<div class="dash-title clearfix">
			<h3>Your General Information
                @if(isset($editMode) && $editMode)
                    <a href="{{route('frontsite.professionals.general-information')}}" class="f-right"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                 @else
                    <a href="{{route('frontsite.professionals.general-information.edit')}}" class="f-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                @endif
            </h3>
		</div>
		<div class="general-information">
			<h2>Please fill up the following to complete your registration.</h2>
			{!!
				Form::open([
					'url' => route('frontsite.professionals.general-information.update'),
					'method' => 'PUT',
					'class' => 'form-holder ajaxify'
				])
			!!}
			<ul>
				@foreach($generalInfoKeysList as $genInfoKey => $genInfoLabel)
					<li>
						<h3>{{$genInfoLabel}}</h3>
						<p>
							@if(isset($editMode) && $editMode)
								<input type="text" name="{{$genInfoKey}}" value="{{$profileInformation[$genInfoKey]}}">
							@else
								{{$profileInformation[$genInfoKey]}}
							@endif
						</p>
					</li>
				@endforeach
			</ul>
			@if(isset($editMode) && $editMode)
                <input type="submit" class="trans-btn btn-yellow" value="SAVE GENERAL INFORMATION" data-orig-text="SAVE GENERAL INFORMATION">
			@endif
			{!!
				Form::close()
			!!}
		</div>
	</div>
@endsection