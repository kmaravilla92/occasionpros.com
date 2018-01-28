@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Ad Posts</h3>
            <div class="pull-right">
                <a href="{{route('backoffice.ad-posts.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Add Ad Post
                </a>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped filterable">
              <thead>
              <tr>
                <th class="no-sort" style="width: 75px;">Actions</th>
                <th>Title</th>
                <th>Date</th>
                <th>Owner</th>
                <th>Created At</th>
                <th>Status</th>
                <!-- <th>Confirmed</th> -->
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th class="no-filter">&nbsp;</th>
                <th>Title</th>
                <th>Date</th>
                <th>Owner</th>
                <th>Created At</th>
                <th>Status</th>
                <!-- <th>Confirmed</th> -->
              </tr>
              </tfoot>
              <tbody>
                @forelse($ad_posts as $ad_post)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('backoffice.ad-posts.edit',$ad_post->id) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                <!-- <li><a href="{{ route('backoffice.ad-posts.show',$ad_post->id) }}"><i class="fa fa-eye"></i>View Details</a></li> -->
                                <li class="divider"></li>
                                <li>
                                    <form class="item-delete-form {{ $ad_post->id }}" action="{{ route('ad-posts.destroy',$ad_post) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" class="delete-item" data-id="{{ $ad_post->id }}"><i class="fa fa-trash-o"></i>Remove</a>
                                </li>
                              </ul>
                            </div>
                        </td>
                        <td>{{ $ad_post->title }}</td>
                        <td>{{ $ad_post->date }}</td>
                        <td>{{ $ad_post->owner()->first()->email }}</td>
                        <td>{{ $ad_post->created_at }}</td>
                        <td>{{ $ad_post->status_text }}</td>
                        <!-- <td>
                            <span class="label label-{{$ad_post->is_confirmed ? 'success' : 'default'}}">
                                {{ $ad_post->is_confirmed_text }}
                            </span>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No ad posts.</td>
                    </tr>
                @endforelse
              </tbody>
              <tfoot>
              <tr>
                <th class="no-filter">&nbsp;</th>
                <th>Title</th>
                <th>Date</th>
                <th>Owner</th>
                <th>Created At</th>
                <th>Status</th>
                <!-- <th>Confirmed</th> -->
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
@include('components.datatables')
@endsection
