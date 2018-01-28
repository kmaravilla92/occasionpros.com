<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class HtmlModule extends Model
{

	protected $table = 'cms_html_modules';

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
