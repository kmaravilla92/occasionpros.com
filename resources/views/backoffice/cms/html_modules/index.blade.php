@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">HTML Modules</h3>
            <div class="pull-right">
                
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
                    <th>Updated At</th>
                    <!-- <th>Status</th> -->
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Title</th>
                    <th>Updated At</th>
                    <!-- <th>Status</th> -->
                  </tr>
              </tfoot>
              <tbody>
                @forelse($html_modules as $html_module)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('backoffice.cms.html-modules.edit',$html_module['id']) }}"><i class="fa fa-pencil-square-o"></i>Edit</a></li>
                              </ul>
                            </div>
                        </td>
                        <td>{{$html_module['title']}}</td>
                        <td>{{$html_module['updated_at']}}</td>
                        <!-- <td>{{$html_module['status_text']}}</td> -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No modules.</td>
                    </tr>
                @endforelse
              </tbody>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Title</th>
                    <th>Updated At</th>
                    <!-- <th>Status</th> -->
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
