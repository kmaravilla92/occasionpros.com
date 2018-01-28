<?php

namespace App\Http\Controllers\Frontsite\Users\Clients;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Repositories\Professional as ProfessionalRepo;
use App\Services\Pagination\Paginator;
use Cache;

class SearchController extends Controller
{

	public function getIndex()
	{
		$pro_categories = Cache::get('pro_categories');
		return view('frontsite.users.clients.client-find-talent', compact('pro_categories'));
	}

    public function getOptions(Request $request)
    {
    	return view('frontsite.users.clients.client-search-options');
    }

    public function getCheckSearchOptions(Request $request)
    {
        $qryStrings = $request->query();
        unset($qryStrings['op_to_contact_me']);
        unset($qryStrings['search_for_op']);
        $searchRoute = route('frontsite.clients.search', $qryStrings);

        if(isset($request->op_to_contact_me) && isset($request->search_for_op)) {
            return redirect(
                route('frontsite.events.create', [
                    'next'  =>  $searchRoute
                ])
            );
        }

        if(isset($request->op_to_contact_me)) {
            return redirect(
                route('frontsite.events.create')
            );
        }

        if(isset($request->search_for_op)) {
            return redirect(
                $searchRoute
            );
        }

        return redirect(
            $searchRoute
        );
    }

    public function getProfessionals(ProfessionalRepo $professional_repo, Request $request)
    {
        $search_results = $professional_repo->search($request->all());
        // dd($search_results);
        $search_results_arr = $search_results->map(function($search_result) use($request)
        {
            // dd($search_result->professional_category_id,$search_result->professionalCategory()->get());
            $search_result['categories_text'] = $search_result->professionalCategory()->get()->implode('title','');
            $search_result['distance'] = calculate_distance(
                $request->latitude,
                $request->longitude,
                $search_result->latitude,
                $search_result->longitude,
                'M'
            );
            return $search_result;
        })
        ->filter(function($search_result) use($request)
        {
            return $search_result['distance'] < 100;
        })->toArray();

        $limit = config('occ_pros.pagination.limit');

        $search_results = (new Paginator(
            $search_results_arr,
            $limit,
            $request->page
        ))->setPath('/clients/search/professionals')->appends($request->all());

        $pagination = $search_results->links()->toHtml();

    	return view(
            'frontsite.users.clients.search-results',
            compact(
                'search_results',
                'search_results_arr',
                'pagination'
            )
        );
    }
}
