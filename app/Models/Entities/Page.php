<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

	protected $table = 'cms_pages';

	protected $guarded = [];

	public function getStatusTextAttribute()
	{
		$status = [
			'Inactive',
			'Active'
		];
		return $status[$this->attributes['status']];
	}
}
