@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <?php
        /*$form_action = route('backoffice.cms.page.store');
        $form_method = 'POST';*/
        if(isset($page)){
            $form_action = route('backoffice.cms.page.update',[$page]);
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
                    {{ isset($page) ? 'Edit Page ( '.$page->title.' )' : 'Create Page' }}
                </h3>
                <div class="pull-right">
                    @if(isset($page))
                        {{--
                            <a href="{{route('backoffice.cms.page.show',['id'=>$page->id])}}" class="btn btn-primary">
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
                    <input type="text" name="title" value="{{ isset($page) ? $page->title : '' }}" class="form-control" id="title" >
                  </div>
                  @if(in_array($page['id'], [5,7,6]))
                      <p>
                          Some contents were manage via the <a href="{{route('backoffice.cms.html-modules.index')}}">HTML Modules</a> page.
                      </p>
                  @else
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="" name="content" class="form-control tinymce" rows="40">{{ isset($page) ? $page->content : '' }}</textarea>
                        <input name="image" type="file" id="upload" class="hidden" onchange="">
                    </div>
                  @endif
                  <hr>
                  <div class="form-group">
                    <label for="title">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ isset($page) ? $page->meta_title : '' }}" class="form-control" id="title" >
                  </div>
                  <div class="form-group">
                    <label for="content">Meta Keywords</label>
                    <textarea id="" name="meta_keywords" class="form-control" rows="5">{{ isset($page) ? $page->meta_keywords : '' }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="content">Meta Description</label>
                    <textarea id="" name="meta_description" class="form-control" rows="5">{{ isset($page) ? $page->meta_description : '' }}</textarea>
                  </div>
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
                            <option value="0" {{ isset($page) && $page->status == '0' ? 'selected' : '' }}>Inactive</option>
                            <option value="2" {{ isset($page) && in_array($page->status,['1','2']) ? 'selected' : '' }}>Active</option>
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
        'type' => 'pages',
        'id' => $page['id'],
        'options_override' => [
            'content_css' => [
                '/frontsite/css/flexslider.css',
                '/frontsite/css/style.css',
                '/site/backoffice/css/cms-tinymce.css'
            ]
        ]
    ]
)