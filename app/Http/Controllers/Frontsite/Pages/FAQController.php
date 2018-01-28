<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\Page;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function __invoke()
    {
    	$page = Page::find(1);
        return view(
        	'frontsite.pages.faq',
        	compact(
        		'page'
        	)
        );
    }
}
