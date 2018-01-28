<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\Page;
use Illuminate\Http\Request;

class TermsOfUserController extends Controller
{
    public function __invoke()
    {
        $page = Page::find(3);
        return view(
        	'frontsite.pages.terms_of_use',
        	compact(
        		'page'
        	)
        );
    }
}
