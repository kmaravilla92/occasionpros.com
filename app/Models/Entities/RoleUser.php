<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_users';

    public function users()
    {
        return $this->hasMany(\App\User::class, 'id', 'user_id');
    }
}
