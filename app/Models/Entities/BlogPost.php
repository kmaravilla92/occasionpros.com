<?php

namespace App\Models\Entities;

use Naabster\EloquentHashids\EloquentHashids;

class BlogPost extends BaseModel
{

    use EloquentHashids;

    protected $appends = ['posted_at','front_site_link','status_text'];

    public function author()
    {
        return $this->belongsTo(\App\User::class,'created_by');
    }

    public function getStatusTextAttribute()
    {
        $status_labels = [
            'Unpublished',
            'Published',
            'Draft'
        ];
        return $status_labels[$this->attributes['status']];
    }

    public function getPostedAtAttribute($value)
    {
        return date('d M Y',strtotime($this->attributes['created_at']));
    }

    public function getFrontSiteLinkAttribute($value)
    {
        return route('frontsite.blog-posts-slug',['slug'=>$this->attributes['slug']]);
    }
}
