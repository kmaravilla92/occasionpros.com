<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'user_settings';

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(\App\User::class);
    }
}
