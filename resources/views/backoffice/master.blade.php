@include('backoffice.includes.header')
<div class="wrapper">
  @include('backoffice.includes.main-header')
  @include('backoffice.includes.main-sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="pull-left">
        Dashboard
        <small>Control panel</small>
      </h1>
      <div class="pull-right">
          @if(!Request::is(config('app.admin_uri')))
            <a href="{{URL::previous()}}" class="btn btn-default">
              <i class="fa fa-long-arrow-left"></i>
              BACK
            </a>
          @endif
      </div>
      <div class="clearfix"></div>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('backoffice.includes.main-footer')
  @include('backoffice.includes.main-control-sidebar')
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('backoffice.includes.footer')
