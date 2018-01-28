<?php

namespace App\Http\Controllers\Backoffice\Cms;

use App\Http\Controllers\Controller;
use App\Models\Entities\HtmlModule as HtmlModuleEntity;
use Illuminate\Http\Request;

class HtmlModuleController extends Controller
{
	CONST VIEW = 'backoffice.cms.html_modules';

	public function index()
	{
		$html_modules = HtmlModuleEntity::all();
		return view(
			self::VIEW.'.index',
			compact(
				'html_modules'
			)
		);
	}

	public function edit(
		Request $request,
		$html_module_id
	)
	{
		$html_module = HtmlModuleEntity::find($html_module_id);
		return view(
			self::VIEW.'.edit',
			compact(
				'html_module'
			)
		);
	}

	public function update(
		Request $request,
		HtmlModuleEntity $html_module
	)
	{

		if(in_array($html_module->id,[14])){

			$latest_talents = [];

			if(isset($request->latest_talents) && count($request->latest_talents)){
				$latest_talents = \App\User::with('profileInformation','profileInformation.selectedCategories','profileInformation.selectedCategories.professionalCategory')->whereIn('id', $request->latest_talents)->get()->toArray();
				$request['options'] = json_encode([
					'latest_talents_ids' => $request->latest_talents
				]);
			}

			$content = view(
	            'frontsite.components.latest-talents',
	            compact(
	                'latest_talents'
	            )
	        );

			$request['content'] = $content;
		}

		$html_module->update(
			$request->only([
				'title',
				'content',
				'options',
				'status'
			])
		);
		
		return back()->with([
            'form' => [
                'success' => 'HTML module has been successfully updated.'
            ]
        ]);
	}
}