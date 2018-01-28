@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <?php
        $form_action = route('event-posts.store');
        $form_method = 'POST';
        if(isset($event_post)){
            $form_action = route('event-posts.update',[$event_post]);
            $form_method = 'PUT';
        }
    ?>
    <form role="form" method="POST" action="{{ $form_action }}" enctype="multipart/form-data">
        {{ method_field($form_method) }}
        {{ csrf_field() }}
        <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title pull-left">
                {{ isset($event_post) ? 'Edit Event Post ( '.$event_post->title.' )' : 'Create Event Post' }}
            </h3>
            <div class="pull-right">
                @if(isset($event_post))
                    <a href="{{route('backoffice.event-posts.show',['id'=>$event_post->id])}}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                        View
                    </a>
                @endif
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

            <div class="box-body">
              <div class="form-group">
                <label for="title">Name of Event</label>
                <input type="text" name="title" value="{{ isset($event_post) ? $event_post->title : '' }}" class="form-control" id="title" >
              </div>
              <div class="form-group">
                <label for="content">Description</label>
                <textarea id="editor1" name="description" class="form-control" rows="10" cols="80">{{ isset($event_post) ? $event_post->description : '' }}</textarea>
              </div>
              <div class="form-group">
                <label for="title">Type of Event</label>
                {!!
                    Form::select(
                        'event_type_id',
                        $event_types,
                        isset($event_post) ? $event_post->event_type_id : '',
                        [
                            'required'      =>  'required',
                            'id'            =>  'type',
                            'class'         =>  'form-control select2autosuggest',
                            'placeholder'   =>  '-- Select Event Type --'
                        ]
                    )
                !!}
              </div>
              <div class="form-group">
                <label for="title">Date & Time of Event</label>
                <input type="text" name="date" value="{{ isset($event_post) ? $event_post->date : '' }}" class="form-control date" id="title" >
              </div>
              <div class="form-group">
                <label for="title">Contact Number</label>
                <input type="text" name="contact_number" value="{{ isset($event_post) ? $event_post->contact_number : '' }}" class="form-control" id="title" >
              </div>
              <div class="form-group">
                <label for="location">Location of Event</label>
                <input type="text" name="location" value="{{ isset($event_post) ? $event_post->location : '' }}" class="form-control" id="location" >
                <input type="hidden" name="latitude" id="location_lat" value="">
                <input type="hidden" name="longitude" id="location_lng" value="">
              </div>
              <div class="form-group">
                <label for="budget">Budget ($)</label>
                <input type="number" name="budget" value="{{ isset($event_post) ? $event_post->budget_float : '' }}" class="form-control" id="budget" >
              </div>
              @if(isset($clients))<div class="form-group">
                <label for="title">Client owner</label>
                {!!
                    Form::select(
                        'email',
                        $clients,
                        isset($event_post) ? $event_post->email : '',
                        [
                            'required'      =>  'required',
                            'id'            =>  'type',
                            'class'         =>  'form-control select2autosuggest',
                            'placeholder'   =>  '-- Select Event Type --'
                        ]
                    )
                !!}
                </div>
              @endif
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.box -->
    </div>
        <!-- /.col-md-9 -->
        <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Status</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <select class="form-control select2autosuggest" name="status">
                        <option value="0" {{ isset($event_post) && $event_post->status == '0' ? 'selected' : '' }}>Inactive</option>
                        <option value="2" {{ isset($event_post) && in_array($event_post->status,['1','2']) ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
        <!-- /.col-md-3 -->
    </form>
  </div>
  <!-- /.row -->
</section>
@endsection

@include('components.select2autosuggest')
@include('components.google-autocomplete', ['options'=>['inputId'=>'location']])

@section('css_head')
    @parent
    <link rel="stylesheet" href="{{asset('bower_components/jquery-ui/themes/base/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontsite/css/lib/jquery.datetimepicker.css')}}">
@endsection

@section('js_bottom')
    @parent
    <script src="{{asset('frontsite/js/lib/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('bower_components/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>
        $(function() {
            // TODO: Ask client how many
            // days must be booked is advanced
            $('.date').datetimepicker({
                timepicker: true,
                format:'M d Y H:i',
                minDate: 0,
                step: 5
            });
        });
    </script>
@endsection