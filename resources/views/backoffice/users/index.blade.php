@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Users</h3>
            <div class="pull-right">
                <a href="{{route('backoffice.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Add User</a>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped filterable">
              <thead>
                  <tr>
                    <th class="no-sort" style="width: 75px;">Actions</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Last Logged-in</th>
                    <th>Created At</th>
                    <th>Status</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Last Logged-in</th>
                    <th>Created At</th>
                    <th>Status</th>
                  </tr>
              </tfoot>
              <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('backoffice.users.edit',$user['id']) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form class="item-delete-form {{ $user['id'] }}" action="{{ route('users.destroy',$user) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" class="delete-item" data-id="{{ $user['id'] }}"><i class="fa fa-trash-o"></i>Remove</a>
                                </li>
                                <!-- <li class="divider"></li>
                                <li><a href="{{ route('users.show',$user['id']) }}"><i class="fa fa-eye"></i>View</a></li> -->
                              </ul>
                            </div>
                        </td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['role'] }}</td>
                        <td>{{ $user['last_login'] }}</td>
                        <td>{{ $user['created_at'] }}</td>
                        <td>{{ $user['status'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No users.</td>
                    </tr>
                @endforelse
              </tbody>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Last Logged-in</th>
                    <th>Created At</th>
                    <th>Status</th>
                  </tr>
              </tfoot>
            </table>
          </div> 
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
@include('components.datatables')
