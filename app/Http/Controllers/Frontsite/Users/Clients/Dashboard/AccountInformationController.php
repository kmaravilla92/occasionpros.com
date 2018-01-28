<?php

namespace App\Http\Controllers\Frontsite\Users\Clients\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;

class AccountInformationController extends Controller
{
    public function __invoke()
    {

    	$user = Sentinel::getUser();

    	return view(
    		'frontsite.users.clients.client-acct-info',
    		compact(
    			'user'
    		)
    	);
    }
    
    public function putUpdatePassword(Request $request)
    {

    }
}
