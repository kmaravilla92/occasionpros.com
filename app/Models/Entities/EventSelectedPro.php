<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entities\EventPost as EventPostEntity;

class EventSelectedPro extends Model
{
    protected $table = 'event_posts_selected_pros';

    protected $guarded = [];

    public function event()
    {
        return $this->hasOne(EventPostEntity::class,'id','event_id');
    }

    public function selectedPro()
    {
        return $this->hasOne(\App\User::class, 'id', 'user_id');
    }

    public function testimonial()
    {
        return $this->hasOne(Testimonial::class, 'id', 'testimonial_id');
    }
}
