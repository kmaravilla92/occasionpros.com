<?php

namespace App\Models\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    protected $table = 'user_membership';

    protected $guarded = [];

    protected $appends = [
        'title',
        'max_bid',
        'max_bid_remaining',
        'max_categories',
        'max_categories_remaining',
        'max_travel_distance',
        'max_audio',
        'max_audio_remaining',
        'max_video',
        'max_video_remaining',
        'max_photos',
        'max_photos_remaining'
    ];

    public function owner()
    {
        return $this->belongsTo(\App\User::class, 'id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function getOptionsAttribute($value)
    {
    	return json_decode($value);
    }

    public function getTitleAttribute()
    {
        return $this->options->title;
    }

    public function getMaxBidAttribute()
    {
        return $this->options->max_bid;
    }

    public function getMaxBidRemainingAttribute()
    {
        return $this->options->max_bid_remaining;
    }

    public function getMaxCategoriesAttribute()
    {
        return $this->options->max_categories;
    }

    public function getMaxCategoriesRemainingAttribute()
    {
        return $this->options->max_categories_remaining;
    }

    public function getMaxTravelDistanceAttribute()
    {
        return $this->options->max_travel_distance;
    }

    public function getMaxAudioAttribute()
    {
        return $this->options->max_audio;
    }

    public function getMaxAudioRemainingAttribute()
    {
        return $this->options->max_audio_remaining;
    }

    public function getMaxVideoAttribute()
    {
        return $this->options->max_video;
    }

    public function getMaxVideoRemainingAttribute()
    {
        return $this->options->max_video_remaining;
    }

    public function getMaxPhotosAttribute()
    {
        return $this->options->max_photos;
    }

    public function getMaxPhotosRemainingAttribute()
    {
        return $this->options->max_photos_remaining;
    }

    public function getIsExpiredAttribute()
    {
        $dateNow = new Carbon;
        $membershipExpirationDate = (new Carbon($this->expired_at));
        return $dateNow > $membershipExpirationDate;
    }
}
