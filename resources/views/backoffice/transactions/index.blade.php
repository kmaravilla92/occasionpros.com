@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Payment Transactions</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped filterable">
              <thead>
              <tr>
                <th class="no-sort" style="width: 75px;">Actions</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Amount ( 5% Fee applied )</th>
                <th>Status</th>
                <th>Created At</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th class="no-filter">&nbsp;</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Amount ( 5% Fee applied )</th>
                <th>Status</th>
                <th>Created At</th>
              </tr>
              </tfoot>
              <tbody>
                @forelse($transactions as $transaction)
                    <tr>
                        <td>
                            <div class="btn-group">
                              <button type="button" class="btn btn-default">Actions</button>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('backoffice.transactions.show',$transaction['id']) }}"><i class="fa fa-eye"></i>View</a></li>
                                <li class="divider"></li>
                                <li>
                                    <form class="item-delete-form {{ $transaction['id'] }}" action="{{ route('transactions.destroy',$transaction) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" class="delete-item" data-id="{{ $transaction['id'] }}"><i class="fa fa-trash-o"></i>Remove</a>
                                </li>
                              </ul>
                            </div>
                        </td>
                        <td>{{ $transaction->code }}</td>
                        <td>$ {{ $transaction->amount }}</td>
                        <td>$ {{ $transaction->feed_amount }}</td>
                        <td>{{ $transaction->status_text }}</td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No transactions.</td>
                    </tr>
                @endforelse
              </tbody>
              <tfoot>
              <tr>
                <th class="no-filter">&nbsp;</th>
                <th>Code</th>
                <th>Amount</th>
                <th>Amount ( 5% Fee applied )</th>
                <th>Status</th>
                <th>Created At</th>
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

@section('tail')
@parent
<script>
    $(document).ready(function(){
        if(window.location.hash != "") {
            $('a[href="' + window.location.hash + '"]').click()
        }
    });
</script>
@endsection
