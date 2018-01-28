<?php

namespace App\Http\Controllers\Frontsite\Pages;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Entities\BlogPost as BlogPostEntity;
use App\Models\SkillCategory;
use App\Models\Entities\Page as PageEntity;
use App\Models\Entities\HtmlModule as HtmlModuleEntity;

class HomeController extends Controller
{
    
    public function getIndex()
    {

        $page_id = 6;

        $page = PageEntity::find($page_id);

        $modules_ids = range(10,14);

        $html_modules = HtmlModuleEntity::whereIn('id', $modules_ids)->where('status', '1')->get()->keyBy('id');

    	$latest_blog_posts = BlogPostEntity::with('author')->select('featured_image','created_at','title','slug')->orderBy('created_at','DESC')->limit(4)->get();

        return view(
        	'frontsite.pages.home',
        	compact(
                'latest_blog_posts',
                'page',
                'html_modules'
            )
        );
    }

    public function getDebug()
    {
    	
    }
}
