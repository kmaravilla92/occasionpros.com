@extends('frontsite.layouts.main')

@section('meta-title', 'Clients Search')

@section('content')
	<section id="main-wrapper" class="search-result-page">
		<div class="section" style="background:#3a94d8;">
			<div class="wrapper">
				<div class="title-holder white-text">
					<h3>
						<span>Search</span>
						RESULTS
					</h3>
					<hr>
				</div>
			</div>
		</div>
		<div class="result-section section">
			<div class="wrapper">
				<div class="results">
					<p>{{count($search_results_arr)}} result(s) found</p>
					<hr>
				</div>
				<div class="listing-holder">
					@each(
						'frontsite.users.clients.search.professionals.search_item', 
						$search_results, 
						'result',
						'frontsite.users.clients.search.professionals.empty'
					)
					<div class="clearfix"></div>
					<br><br>
					@if(isset($pagination) && count($search_results))
				        <div class="clearfix res-pag">
				            {!! $pagination !!}
				        </div>
				    @endif
				</div>
			</div>
		</div>
	</section>
@endsection