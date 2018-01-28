@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Blog Posts</h3>
            <div class="pull-right">
                <a href="{{route('blog-posts.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> &nbsp; Add Post
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
                <th>Author</th>
                <th>Created At</th>
                <th>Status</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th class="no-filter">&nbsp;</th>
                <th>Title</th>
                <th>Author</th>
                <th>Created At</th>
                <th>Status</th>
              </tr>
              </tfoot>
              <tbody>
                @forelse($blog_posts as $blog_post)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('blog-posts.edit',$blog_post['id']) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                                <li>
                                    <form class="item-delete-form {{ $blog_post['id'] }}" action="{{ route('blog-posts.destroy',$blog_post) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" class="delete-item" data-id="{{ $blog_post['id'] }}"><i class="fa fa-trash-o"></i>Remove</a>
                                </li>
                                <!-- <li class="divider"></li>
                                <li><a href="{{ route('blog-posts.show',$blog_post['id']) }}"><i class="fa fa-eye"></i>View</a></li> -->
                              </ul>
                            </div>
                        </td>
                        <td>{{ $blog_post['title'] }}</td>
                        <td>Admin</td>
                        <td>{{ $blog_post['created_at'] }}</td>
                        <td>{{ $blog_post['status_text'] }}</td>
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
                <th>Author</th>
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
@include('components.datatables')
@endsection
