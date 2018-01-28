@extends('backoffice.master')
@section('content')
<!-- Main content -->
<section class="content app-dashboard">
  <!-- Small boxes (Stat box) -->
  	<div class="row">
	    @foreach($dashboardItems as $dashboardItemTitle => $dashboardItem)
	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
				<div class="small-box {{$dashboardItem['background']}}">
					<div class="inner">
						<h3>{{$dashboardItem['count']}}</h3>

						<p>{{$dashboardItemTitle}}</p>
					</div>
				<div class="icon">
					<i class="fa {{$dashboardItem['icon']}}"></i>
				</div>
					<a href="{{$dashboardItem['link']}}" class="small-box-footer">See more <i class="fa fa-arrow-circle-right"></i></a>
				</div>
	        </div>
	    @endforeach
    <!-- ./col -->
  	</div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
