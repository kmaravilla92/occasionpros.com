<?php

namespace App\Models\Entities;

use App\User as UserEntity;

class Testimonial extends BaseModel
{

    protected $appends = ['reviewed_at','rating_float'];

    protected $guarded = [];

    public function reviewer()
    {
    	return $this->hasOne(UserEntity::class, 'id', 'created_by');
    }

    public function owner()
    {
    	return $this->hasOne(UserEntity::class, 'id', 'created_for');
    }

    public function event()
    {
    	return $this->hasOne(EventPost::class, 'id', 'event_id');
    }

    public function getRatingFloatAttribute()
    {
        return number_format($this->attributes['rating'], 1, '.', ',');
    }

    public function getReviewedAtAttribute()
    {
        return date(
            config('occ_pros.settings.events.date_format'),
            strtotime($this->attributes['created_at'])
        );
    }
}
