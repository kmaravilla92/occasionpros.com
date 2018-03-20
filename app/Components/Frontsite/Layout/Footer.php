<?php

namespace App\Components\Frontsite\Layout;

use App\Components\ComponentsInterface;
use App\Models\Entities\BlogPost;
use Cache;

class Footer implements ComponentsInterface
{
    public static function render()
    {
        $recent_blog_posts = Cache::rememberForever('frontsite_recent_blog_posts', function() {
            return BlogPost::select('title','slug')->orderBy('created_at','DESC')->limit(5)->get();
        });

        return view(
            'frontsite.layouts.footer',
            compact(
                'recent_blog_posts'
            )
        );
    }
}