<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Blog\StoreBlog;
use App\Models\Entities\BlogPost as BlogPostEntity;
use App\Models\Repositories\Blog as BlogPostRepo;

class BlogController extends Controller
{
    CONST VIEW = 'backoffice.blog-posts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $APIReponse = $this->httpClient->get('api/blog-posts', [
            'query' => [
                'per_page' => 999999
            ]
        ]);

        $blog_posts = $APIReponse['results']['data'] ?: [];
        return view(self::VIEW .'.index',compact('blog_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::VIEW .'.create', []);
    }   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(isset($request->cancel)){
            return redirect(route('blog-posts.index'))->with([
                'form' => [
                    'info' => 'Blog post discarded.'
                ]
            ]);
        }

        $currentUser = \Sentinel::getUser();
        $form_params = $request->all();
        $form_params['created_by'] = $currentUser->id;

        $featured_image = [];
        if(isset($form_params['featured_image'])) {
            $image_path = $form_params['featured_image']->getPathname();
            $image_mime = $form_params['featured_image']->getmimeType();
            $image_org  = $form_params['featured_image']->getClientOriginalName();
            $featured_image = [
                [
                    'name'     => 'featured_image',
                    'filename' => $image_org,
                    'Mime-Type'=> $image_mime,
                    'contents' => fopen( $image_path, 'r' ),
                ],
            ];
        }

        $multipart = [];

        foreach($form_params as $name => $value) {
            $multipart[] = [
                'name'      => $name,
                'contents' => $value
            ];
        }

        $blogPostCreate = $this->httpClient->post('api/blog-posts',[
            'multipart' => array_merge($multipart,$featured_image)
        ]);

        if($blogPostCreate){
            return redirect(route('blog-posts.create'))->with([
                'form' => [
                    'success' => 'Blog post successfully created.'
                ]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return BlogPostEntity::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  BlogPost $blog_post
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPostEntity $blog_post)
    {
        return view(self::VIEW .'.edit', ['blog_post'=>$blog_post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, BlogPostEntity $blog_post)
     {

        if(isset($request->cancel)){
            return redirect(route('blog-posts.index'))->with([
                'form' => [
                    'info' => 'Blog post discarded.'
                ]
            ]);
        }

        $form_params = $request->all();
        $form_params['_method'] = 'POST';
        $form_params['id'] = $blog_post->id;
        $form_params['postId'] = $blog_post->id;

         $featured_image = [];
         if(isset($form_params['featured_image'])) {
             $image_path = $form_params['featured_image']->getPathname();
             $image_mime = $form_params['featured_image']->getmimeType();
             $image_org  = $form_params['featured_image']->getClientOriginalName();
             $featured_image = [
                 [
                     'name'     => 'featured_image',
                     'filename' => $image_org,
                     'Mime-Type'=> $image_mime,
                     'contents' => fopen( $image_path, 'r' ),
                 ],
             ];
         }

        $multipart = [];

        foreach($form_params as $name => $value) {
            $multipart[] = [
                'name'      => $name,
                'contents' => $value
            ];
        }

        // dd(array_merge($multipart,$featured_image));

        $blogPostUpdate = $this->httpClient->post('api/blog-posts',[
            'multipart' => array_merge($multipart,$featured_image)
        ]);

        if(is_null($blogPostUpdate['errors'])){
            return redirect(route('blog-posts.edit',[$blog_post]))->with([
                'form' => [
                    'success' => 'Blog post successfully updated.'
                ]
            ]);
        }
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPostEntity $blog_post)
    {
        if($blog_post->delete()){
            return back()->with([
                'form' => [
                    'success' => 'Blog post successfully deleted.'
                ]
            ]);
        }
    }
}
