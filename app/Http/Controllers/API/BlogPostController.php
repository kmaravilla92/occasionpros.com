<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Blog\UpdateBlog;
use App\Models\Repositories\Blog as BlogRepository;
use App\Models\Entities\BlogPost as BlogPostEntity;

class BlogPostController extends Controller
{

    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => []
        ];
        
        $data['results'] = $this->blogRepository->getPosts($request->all());
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => $request->all()
        ];

        if(isset($request->postId)) {
            $this->update($request,$request->postId);
        }else{
            $this->blogRepository->save($request);
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $data = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => 'Blog post found.',
            'results'       => null
        ];

        $blogPost = $this->blogRepository->getPostBySlug($slug);
        
        switch($blogPost) {
            case null:
                $data['statusCode'] = 404;
                $data['errors'] = 'Blog post not found.';
                $data['message'] = 'Blog post not found.';
            break;
            default:
                $blogPost->author = $blogPost->author()->first();
                $data['results']['data'] = $blogPost;
            break;
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = [
            'statusCode'    => 200,
            'errors'        => null,
            'message'       => null,
            'results'       => [
                'data' => null
            ]
        ];
        
        $blogPost                    = BlogPostEntity::find($id);
        $blogPost->title             = $request['title'];
        $blogPost->slug              = str_slug($request['title']);
        $blogPost->uuid              = mt_rand(00000,99999);
        $blogPost->content           = $request['content'];
        $blogPost->meta_title        = $request['meta_title'];
        $blogPost->meta_keywords     = $request['meta_keywords'];
        $blogPost->meta_description  = $request['meta_description'];

        if($request->hasFile('featured_image')){
            $imagePath = $request->featured_image->store('public/uploads/blog-posts');
            $imagePath = str_replace('public/','/storage/',$imagePath);
            $blogPost->featured_image    = $imagePath;
        }
        
        $blogPost->status            = $request->status;
        $response['results']['data'] = $blogPost->update();

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
