@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <?php
        /*$form_action = route('backoffice.cms.page.store');
        $form_method = 'POST';*/
        if(isset($html_module)){
            $form_action = route('backoffice.cms.html-modules.update',[$html_module]);
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
                    {{ isset($html_module) ? 'Edit HTML Module ( '.$html_module->title.' )' : 'Create HTML Module' }}
                </h3>
                <div class="pull-right">
                    @if(isset($html_module))
                        {{--
                            <a href="{{route('backoffice.cms.page.show',['id'=>$html_module->id])}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                                View
                            </a>
                        --}}
                    @endif
                </div>
                <div class="clearfix"></div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Page Title</label>
                    <input type="text" name="title" value="{{ isset($html_module) ? $html_module->title : '' }}" class="form-control" id="title" >
                  </div>
                  @if(in_array($html_module['id'],[14]))
                      <?php 
                            $prosGroup = Sentinel::findRoleBySlug('professionals');
                            $pros = $prosGroup->users()->orderBy('email','ASC')->get();
                            $selectedTalentsIds = json_decode($html_module['options'])->latest_talents_ids;
                      ?>
                    <div class="form-group">
                        <label for="latest_talents">Latest Talents</label>
                        <select name="latest_talents[]" id="latest_talents" class="form-control select2autosuggest" multiple>
                            @forelse($pros as $pro)
                                <option value="{{$pro['id']}}" {{in_array($pro['id'], $selectedTalentsIds) ? 'selected="selected"' : ''}}>
                                    {{$pro['first_name']}} {{$pro['last_name']}} ( {{$pro['email']}} )
                                </option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    @include('components.select2autosuggest')
                  @else
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="" name="content" class="form-control tinymce" rows="40">{{ isset($html_module) ? $html_module->content : '' }}</textarea>
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
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
                            <option value="0" {{ isset($html_module) && $html_module->status == '0' ? 'selected' : '' }}>Inactive</option>
                            <option value="2" {{ isset($html_module) && in_array($html_module->status,['1','2']) ? 'selected' : '' }}>Active</option>
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

@include(
    'components.tinymce', 
    [
        'type' => 'html_modules',
        'id' => $html_module['id'],
        'options_override' => [
            'content_css' => [
                '/frontsite/css/flexslider.css',
                '/frontsite/css/style.css',
                '/site/backoffice/css/cms-tinymce.css'
            ]
        ]
    ]
)