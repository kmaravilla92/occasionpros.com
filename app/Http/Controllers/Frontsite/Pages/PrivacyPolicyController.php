<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\Page;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function __invoke()
    {
        $page = Page::find(2);
        return view(
        	'frontsite.pages.privacy_policy',
        	compact(
        		'page'
        	)
        );
    }
}
