<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function __invoke()
    {
    	return view('frontsite.users.professionals.pro-profile-view');
    }
}
