<?php

namespace App\Models\Entities;

use Carbon\Carbon;
use Naabster\EloquentHashids\EloquentHashids;

class AdPost extends BaseModel
{

    use EloquentHashids;

    protected $table = 'professionals_ad_posts';
    
    protected $guarded = [];

    protected $appends = ['is_expired'];

    public function owner()
    {
        return $this->hasOne(\App\User::class, 'id', 'created_by');
    }

    public function setExpiredAtAttribute($value)
    {
        $date_now = (new Carbon());
        $expired_at = $date_now->addWeeks(1);
        if(is_null($value)){
            $expired_at = null;
        }
        $this->attributes['expired_at'] = $expired_at;
    }

    public function getIsExpiredAttribute()
    {
    	$expired_at = (new Carbon($this->attributes['expired_at']));
    	$date_now = (new Carbon);
    	return $expired_at < $date_now;
    }

    public function getLocationAttribute($location)
    {
    	return $location ? $location : 'N/A';
    }

    public function getStatusTextAttribute($value)
    {
        $status_labels = [
            'Needs approval',
            'Approved',
            'Expired',
            'Pending',
            'Inactive'
        ];

        try{
            return $status_labels[$this->attributes['status']];
        }catch(Exception $e){
            return $this->attributes['status'].' - UNKNOWN';
        }
    }
}
