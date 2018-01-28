@extends('backoffice.master')
@section('content')
@include('backoffice.includes.errors')
<section class="content">
  <div class="row">
    <?php
        $form_action = route('blog-posts.store');
        $form_method = 'POST';
        if(isset($blog_post)){
            $form_action = route('blog-posts.update',[$blog_post]);
            $form_method = 'PUT';
        }
    ?>
    <form role="form" method="POST" action="{{ $form_action }}" enctype="multipart/form-data">
        {{ method_field($form_method) }}
        {{ csrf_field() }}
        <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
                {{ isset($blog_post) ? 'Edit Blog Post ( '.$blog_post->title.' )' : 'Create Blog Post' }}
            </h3>
            @if(isset($blog_post))
                <a href="{{route('frontsite.blog-posts-slug',[$blog_post->slug,'as_admin'=>1])}}" class="label bg-blue" target="_blank">
                    <i class="fa fa-eye"></i>&nbsp;View
                </a>
            @endif
          </div>
          <!-- /.box-header -->
          <!-- form start -->

            <div class="box-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ isset($blog_post) ? $blog_post->title : '' }}" class="form-control" id="title" placeholder="Title" required>
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" name="slug" value="{{ isset($blog_post) ? $blog_post->slug : '' }}" class="form-control" id="slug" placeholder="Slug" required>
              </div>
              <div class="form-group">
                <label for="content">Content</label>
                <textarea id="editor1" name="content" class="tinymce" rows="10" cols="80">{{ isset($blog_post) ? $blog_post->content : '' }}</textarea>
                <input name="image" type="file" id="upload" class="hidden" onchange="">
              </div>
              <hr>
              <div class="form-group">
                <label for="title">Meta Title</label>
                <input type="text" name="meta_title" value="{{ isset($blog_post) ? $blog_post->meta_title : '' }}" class="form-control" id="title" >
              </div>
              <div class="form-group">
                <label for="content">Meta Keywords</label>
                <textarea id="" name="meta_keywords" class="form-control" rows="5">{{ isset($blog_post) ? $blog_post->meta_keywords : '' }}</textarea>
              </div>
              <div class="form-group">
                <label for="content">Meta Description</label>
                <textarea id="" name="meta_description" class="form-control" rows="5">{{ isset($blog_post) ? $blog_post->meta_description : '' }}</textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" name="cancel" class="btn btn-default">
                    <i class="fa fa-times"></i> &nbsp; Cancel
                </button>
                <button type="submit" name="save" class="btn btn-primary">
                    <i class="fa fa-floppy-o"></i> &nbsp; Save
                </button>
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
                    <select class="form-control" name="status">
                        <option value="1" {{ isset($blog_post) && $blog_post->status == '1' ? 'selected' : '' }}>Publish</option>
                        <option value="0" {{ isset($blog_post) && $blog_post->status == '0' ? 'selected' : '' }}>Unpublish</option>
                        <option value="2" {{ isset($blog_post) && $blog_post->status == '2' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Featured Image</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                  @if(isset($blog_post) && isset($blog_post->featured_image))
                    <img src="{{ $blog_post->featured_image }}" alt="{{ $blog_post->featured_image }}" class="img-responsive"/>
                  @endif
                  <br>
                  <input type="file" name="featured_image" id="featured_image">
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
        'type' => 'blog_posts',
        'id' => isset($blog_post->id) ? $blog_post->id : 'for-all',
        'options_override' => [
            'content_css' => [
                '/frontsite/css/flexslider.css',
                '/frontsite/css/style.css',
                '/site/backoffice/css/cms-tinymce.css'
            ]
        ]
    ]
)
