<?php

namespace App\Models\Entities;

use Naabster\EloquentHashids\EloquentHashids;

class EventPost extends BaseModel
{

    use EloquentHashids;

    protected $appends = [
        'status_text',
        'budget_float',
        'is_sms_verified'
    ];

    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(\App\User::class,'created_by');
    }

    public function bids()
    {
        return $this->hasMany(EventBid::class,'event_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class,'event_id');
    }

    public function selectedPro()
    {
        return $this->hasOne(EventSelectedPro::class, 'event_id', 'id');
    }

    public function type()
    {
        return $this->hasOne(EventType::class, 'id', 'event_type_id');
    }

    public function getStatusTextAttribute($value)
    {
        $status_labels = [
            'Needs Client Email Verification',
            'Needs SMS Verification',
            'Verified'
        ];
        return $status_labels[$this->attributes['status']];
    }

    public function getIsConfirmedAttribute($value)
    {
        return isset($this->attribute['confirmed_at']);
    }

    public function getIsConfirmedTextAttribute($value)
    {
        return isset($this->attribute['confirmed_at']) ? 'YES':'NO';
    }

    public function getDateAttribute($value)
    {
        return date(
            config('occ_pros.settings.events.date_format'),
            strtotime($value)
        );
    }

    public function getBudgetAttribute($value)
    {
        return '$ ' . number_format((double)$value, 2, '.', ',');
    }

    public function getBudgetFloatAttribute()
    {
        return (double)$this->attributes['budget'];
    }

    public function getIsSmsVerifiedAttribute()
    {
        return $this->attributes['status'] == '2' && isset($this->attributes['sms_verification_code']);
    }
}
