@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <form role="form" method="POST" action="{{ route('backoffice.marketing.send-top-events.post') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title pull-left">
                    Send Top Events to Pros
                </h3>
                <div class="clearfix"></div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="recipients" class="pull-left">
                            Recipients ( Pros Only )
                        </label>
                        <div class="pull-right">
                            <label for="recipients-actions">Actions</label>
                            <select name="recipients-actions" id="recipients-actions" data-target="recipients">
                                <option value="select-all">Select All</option>
                                <option value="unselect-all">Unselect All</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <select name="recipients[]" id="recipients" multiple class="form-control select2autosuggest">
                            @forelse($pros as $pro)
                                <option value="{{$pro['id']}}" selected="selected">
                                    {{$pro['email']}}
                                </option>
                            @empty    
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="events" class="pull-left">
                            Events ( Approved & Active Only )
                        </label>
                        <div class="pull-right">
                            <label for="events-actions">Actions</label>
                            <select name="events-actions" id="events-actions" data-target="events">
                                <option value="select-all">Select All</option>
                                <option value="unselect-all">Unselect All</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <select name="events[]" id="events" multiple class="form-control select2autosuggest">
                            @forelse($events as $event)
                                <option value="{{$event['id']}}" selected="selected">
                                    {{$event['title']}}
                                </option>
                            @empty    
                            @endforelse
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-md-9 -->
    </form>
  </div>
  <!-- /.row -->
</section>
@include('components.select2autosuggest')
@endsection

@section('js_bottom')
    @parent
    <script>
        $(function(){
            var $actions = $('#recipients-actions,#events-actions');

                $actions.on('change', function(){
                    var $this = $(this),
                        value = $this.val(),
                        $target = $('#' + $this.attr('data-target'));
                        switch(value){
                            case 'select-all':
                                $target.find('option').prop('selected',true);
                            break;
                            case 'unselect-all':
                                $target.find('option').prop('selected',false);
                            break;
                            default:
                            break;
                        }
                        
                        $target.trigger('change');
                }).trigger('change');
        });
    </script>
@endsection