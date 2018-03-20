@extends('backoffice.master')
@section('content')
<section class="content">
  <div class="row">
    <?php
        $form_action = route('ad-posts.store');
        $form_method = 'POST';
        if(isset($ad_post)){
            $form_action = route('ad-posts.update',[$ad_post]);
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
                {{ isset($ad_post) ? 'Edit Ad Post ( '.$ad_post->title.' )' : 'Create Ad Post' }}
            </h3>
            <div class="pull-right">
                @if(isset($ad_post))
                    <!-- <a href="{{route('backoffice.ad-posts.show',['id'=>$ad_post->id])}}" class="btn btn-primary">
                        <i class="fa fa-eye"></i>
                        View
                    </a> -->
                @endif
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /.box-header -->
          <!-- form start -->

            <div class="box-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="ad[title]" value="{{ isset($ad_post) ? $ad_post->title : '' }}" class="form-control" id="title" >
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="editor1" name="ad[content]" class="form-control" rows="10" cols="80">{{ isset($ad_post) ? $ad_post->content : '' }}</textarea>
              </div>
              <div class="form-group">
                <label for="location">Location of Event</label>
                <input type="text" name="ad[location]" value="{{ isset($ad_post) ? $ad_post->location : '' }}" class="form-control" id="location" >
              </div>
              <div class="form-group">
                <label for="location_lat">Latitude</label>
                <input type="text" name="ad[latitude]" value="{{ isset($ad_post) ? $ad_post->latitude : '' }}" class="form-control" id="location_lat" >
              </div>
              <div class="form-group">
                <label for="location_lng">Longitude</label>
                <input type="text" name="ad[longitude]" value="{{ isset($ad_post) ? $ad_post->longitude : '' }}" class="form-control" id="location_lng" >
              </div>
              @if(isset($clients))<div class="form-group">
                <label for="title">Owner</label>
                {!!
                    Form::select(
                        'email',
                        $clients,
                        isset($ad_post) ? $ad_post->created_by : '',
                        [
                            'required'      =>  'required',
                            'id'            =>  'type',
                            'class'         =>  'form-control select2autosuggest',
                            'placeholder'   =>  '-- Select Owner --'
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
                    <select class="form-control select2autosuggest" name="ad[status]">
                        <?php 
                            $status_labels = [
                                'Needs approval',
                                'Approved/Active',
                                'Expired',
                                'Pending',
                                'Inactive'
                            ];
                            
                            if(is_null($ad_post)){
                                unset($status_labels[2]);
                            }
                        ?>
                        @foreach($status_labels as $index => $status_label)
                            <option
                                value="{{$index}}"
                                {{isset($ad_post) && $ad_post->status == $index ? 'selected' : ''}}
                            >
                                {{$status_label}}
                            </option>
                        @endforeach
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