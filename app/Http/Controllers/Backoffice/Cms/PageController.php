<?php

namespace App\Http\Controllers\Backoffice\Cms;

use App\Http\Controllers\Controller;
use App\Models\Entities\Page as PageEntity;
use Illuminate\Http\Request;

class PageController extends Controller
{
	CONST VIEW = 'backoffice.cms.pages';

	public function index()
	{
		$pages = PageEntity::all();
		return view(
			self::VIEW.'.index',
			compact(
				'pages'
			)
		);
	}

	public function edit(
		Request $request,
		$page_id
	)
	{
		$page = PageEntity::find($page_id);
		return view(
			self::VIEW.'.edit',
			compact(
				'page'
			)
		);
	}

	public function update(
		Request $request,
		PageEntity $page
	)
	{
		$page->update(
			$request->only([
				'title',
				'content',
				'meta_title',
				'meta_keywords',
				'meta_description',
				'status'
			])
		);
		
		return back()->with([
            'form' => [
                'success' => 'Page has been successfully updated.'
            ]
        ]);
	}
}