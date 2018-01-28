<?php

namespace App\Models\Entities;

use Naabster\EloquentHashids\EloquentHashids;

class EventBid extends BaseModel
{

    use EloquentHashids;

    protected $table = 'events_bids';

    protected $guarded = [];

    public function bidder()
    {
        return $this->belongsTo(\App\User::class,'created_by');
    }

    public function event()
    {
        return $this->belongsTo(EventPost::class,'event_id');
    }
}
