<?php

namespace App\Http\Controllers\Frontsite\Users\Professionals;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Repositories\Professional as ProfessionalRepo; 
use Sentinel;

class SearchController extends Controller
{
	protected $model_repo;

	public function __construct(ProfessionalRepo $profession_repo)
	{
		$this->model_repo = $profession_repo;
	}

    public function __invoke(Request $request)
    {
    	return $this->model_repo->search($request->all());
    }
}