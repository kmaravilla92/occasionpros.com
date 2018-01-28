<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Pagination\Paginator;
use App\Models\Entities\Page;
use App\Models\Entities\HtmlModule;
use App\Services\Api\Http\Client as OPApiClient;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $page;

    protected $blog_header;

    public function __construct(OPApiClient $httpClient)
    {
        $this->page = Page::find(4);
        $this->blog_header = HtmlModule::find(1)->content;
        parent::__construct($httpClient);
    }

    public function getIndex(Request $request)
    {
        $APIReponse = $this->httpClient->get('api/blog-posts', []);

        $limit = config('occ_pros.pagination.limit');

        $blogPosts = (new Paginator(
            $APIReponse['results']['data'],
            $limit,
            $request->page
        ))->setPath('/blog-posts');

        $pagination = $blogPosts->links('vendor.pagination.default-blog')->toHtml();
        
        $page = $this->page;

        $blog_header = $this->blog_header;

        return view(
            'frontsite.blog-posts.index',
            compact(
                'blogPosts',
                'pagination',
                'page',
                'blog_header'
            )
        );
    }

    public function getShow(Request $request)
    {
        $APIReponse = $this
                        ->httpClient
                        ->get(
                            'api/blog-posts/' . $request->slug, 
                            [
                                'query' => [
                                    'as_admin' => $request->as_admin
                                ]
                            ]
                        );

        $blogPost = $APIReponse['results']['data'];

        $author = $APIReponse['results']['data']['author'];

        $page = $this->page;

        $blog_header = $this->blog_header;

        return view(
            'frontsite.blog-posts.single',
            compact(
                'APIReponse',
                'blogPost',
                'author',
                'page',
                'blog_header'
            )
        );
    }
}
