<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\Page as PageEntity;
use App\Models\Entities\HtmlModule as HtmlModuleEntity;
use Illuminate\Http\Request;

class HowItWorksController extends Controller
{
    public function __invoke()
    {

    	$page_id = 7;

    	$page = PageEntity::find($page_id);

    	$modules_ids = range(6,9);

    	$html_modules = HtmlModuleEntity::whereIn('id', $modules_ids)->where('status', '1')->get()->keyBy('id');

        return view(
        	'frontsite.pages.how_it_works',
        	compact(
        		'page',
        		'html_modules'
        	)
        );
    }
}
