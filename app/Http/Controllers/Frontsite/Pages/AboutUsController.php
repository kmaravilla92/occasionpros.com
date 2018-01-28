<?php

namespace App\Http\Controllers\Frontsite\Pages;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Entities\Page as PageEntity;
use App\Models\Entities\HtmlModule as HtmlModuleEntity;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __invoke()
    {

    	$page_id = 5;

    	$page = PageEntity::find($page_id);

    	$modules_ids = range(2,5);

    	$html_modules = HtmlModuleEntity::whereIn('id', $modules_ids)->where('status', '1')->get()->keyBy('id');

        return view(
        	'frontsite.pages.about_us',
        	compact(
        		'page',
        		'html_modules'
        	)
        );
    }
}
