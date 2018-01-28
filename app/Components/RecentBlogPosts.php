<?php

namespace App\Components;

use App\Models\Entities\BlogPost;

class RecentBlogPosts extends AbstractComponent implements ComponentsInterface
{
    public static function render()
    {
        $recent_blog_posts = BlogPost::select('title','slug')->orderBy('created_at','DESC')->limit(5)->get();

        return view(
            self::VIEW.'.recent-blog-posts',
            compact(
                'recent_blog_posts'
            )
        );
    }
}