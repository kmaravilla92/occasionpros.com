@extends('backoffice.master')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Email Blasts Types</h3>
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
                    <th>Description</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Title</th>
                    <th>Description</th>
                  </tr>
              </tfoot>
              <tbody>
                @forelse($email_blast_types as $title => $email_blast_type)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ $email_blast_type['show_link'] }}"><i class="fa fa-pencil-square-o"></i>Manage</a></li>
                              </ul>
                            </div>
                        </td>
                        <td>{{$title}}</td>
                        <th>{{$email_blast_type['description']}}</th>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No email blast types.</td>
                    </tr>
                @endforelse
              </tbody>
              <tfoot>
                  <tr>
                    <th class="no-filter">&nbsp;</th>
                    <th>Title</th>
                    <th>Description</th>
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
