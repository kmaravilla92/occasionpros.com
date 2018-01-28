<?php

namespace App\Http\Controllers\Backoffice\Cms;

use App\Http\Controllers\Controller;
use App\Models\Entities\Page as PageEntity;
use Illuminate\Http\Request;

class WysiwygImageController extends Controller
{
	public function postUpload(Request $request)
	{
		$type = $request->type; // html_modules or pages
		$id = $request->id;
		if($request->hasFile('image')){
            $imagePath = $request->image->store(
            	sprintf(
            		'public/uploads/%s/%s',
            		$type,
            		$id
            	)
            );
            $imagePath = str_replace('public/','/storage/',$imagePath);
           	return $imagePath;
        }

        return '';
	}

}