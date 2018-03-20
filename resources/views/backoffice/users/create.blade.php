@extends('backoffice.master')
@section('content')
<section class="content">
  <div class="row">
    <?php
        $form_action = route('users.store');
        $form_method = 'POST';
        if(isset($user) && isset($user->id)){
            $form_action = route('users.update',[$user]);
            $form_method = 'PUT';
        }
    ?>
    <form role="form" method="POST" action="{{ $form_action }}" class="form-horizontal" enctype="multipart/form-data">
        {{ method_field($form_method) }}
        {{ csrf_field() }}
        @include('backoffice.users.components.user-profile-summary',[
          'user'=>$user,
          'userProfile'=>$userProfile,
          'col_md'=>'col-md-4'
        ])
	     
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#details" data-toggle="tab" aria-expanded="false">Details</a></li>
              <li><a href="#groups" data-toggle="tab" aria-expanded="false">Groups</a></li>
              <li><a href="#password" data-toggle="tab" aria-expanded="false">Password</a></li>
            </ul>
            <div class="tab-content">
              @include('backoffice.users.components.details-edit',['user'=>$user])
              @include('backoffice.users.components.group-edit',['user'=>$user])
              @include('backoffice.users.components.password-edit',['user'=>$user])
              <!-- /.tab-pane -->
              <div class="clearfix"></div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
    	<!-- /.col-md-9 -->
    </form>
  </div>
  <!-- /.row -->
</section>
@endsection
