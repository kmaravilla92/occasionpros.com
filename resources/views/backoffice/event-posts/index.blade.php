@extends('backoffice.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Event Posts</h3>
            <div class="pull-right">
                <a href="{{route('backoffice.event-posts.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Add Event
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
                @forelse($event_posts as $event_post)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('backoffice.event-posts.edit',$event_post->id) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                <li><a href="{{ route('backoffice.event-posts.show',$event_post->id) }}"><i class="fa fa-eye"></i>View Details</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form class="item-delete-form {{ $event_post->id }}" action="{{ route('event-posts.destroy',$event_post) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" class="delete-item" data-id="{{ $event_post->id }}"><i class="fa fa-trash-o"></i>Remove</a>
                                </li>
                              </ul>
                            </div>
                        </td>
                        <td>{{ $event_post->title }}</td>
                        <td>{{ $event_post->date }}</td>
                        <td>{{ ($owner = $event_post->owner()->first()) ? $owner->email : 'N\A' }}</td>
                        <td>{{ $event_post->created_at }}</td>
                        <td>{{ $event_post->status_text }}</td>
                        <!-- <td>
                            <span class="label label-{{$event_post->is_confirmed ? 'success' : 'default'}}">
                                {{ $event_post->is_confirmed_text }}
                            </span>
                        </td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No blog posts.</td>
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
