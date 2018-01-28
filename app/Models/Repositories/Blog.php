<?php

namespace App\Models\Repositories;

use App\Models\Entities\BlogPost as BlogPostEntity;

class Blog extends BaseRepository
{

    public function __construct(BlogPostEntity $entity)
    {
        $this->setEntity($entity);
    }

    public function getPosts($options = [])
    {

        $entity = $this->entity;

        if(isset($options['status'])){
            $status = $options['status'];
            $entity = $entity->where('status',$status);
        }

        if(isset($options['s'])){
            $s = $options['s'];
            $entity = $entity->where(function($query)use($s){
                $query
                    ->where('title','like','%'.$s.'%');
            });
        }

        $entity = $entity->orderBy('created_at','DESC');

        if(isset($options['limit'])){
            $limit = $options['limit'];
            $entity = $entity->limit($limit);
        }

        if(!isset($options['per_page'])){
            $options['per_page'] = null;
        }

        return $entity->paginate($options['per_page']);
    }

    public function getRecentPosts($limit = 10)
    {
        return $this->getPosts(['limit'=>$limit]);
    }

    public function getPostBySlug($slug = null)
    {
        $entity = $this->entity;
        
        return $entity->where(function($query) use($slug)
        {
            $query
                ->where('slug', $slug);
            if(\Request::get('as_admin') == null){
                $query->where('status', '1');
            }    
        })->first();
    }

    public function save($data)
    {
        if(isset($data['id'])) {
            $this->entity = $this->entity->find($data['id']);
        }
        $this->entity->title             = $data['title'];
        $this->entity->slug              = str_slug($data['title']);
        $this->entity->uuid              = mt_rand(00000,99999);
        $this->entity->content           = $data['content'];
        if(isset($data->featured_image)){
            $this->entity->featured_image    = $this->saveFeaturedImage($data);
        }
        $this->entity->meta_title        = $data['meta_title'];
        $this->entity->meta_keywords     = $data['meta_keywords'];
        $this->entity->meta_description  = $data['meta_description'];
        $this->entity->created_by        = $data['created_by'];
        $this->entity->status            = $data['status'];
        return $this->entity->save();
    }

    protected function saveFeaturedImage($data)
    {
        $imagePath = $data->featured_image->store('public/uploads/blog-posts');
        return str_replace('public/','/storage/',$imagePath);
    }
}
