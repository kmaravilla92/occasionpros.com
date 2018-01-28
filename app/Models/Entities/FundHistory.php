<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Naabster\EloquentHashids\EloquentHashids;

class FundHistory extends Model
{
	use EloquentHashids;
	
    protected $table = 'funds_history';
}
