<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
	public function __construct()
	{
		$this->middleware('backoffice.admin_only');
	}
}