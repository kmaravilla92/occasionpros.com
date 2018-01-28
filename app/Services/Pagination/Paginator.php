<?php

namespace App\Services\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{

	public function __construct(
		$items,
		$perPage,
		$currentPage = null,
		$options = []
	)
	{

		$total = count($items);

		$items = $this->sliceItems(
					$items,
					$perPage,
					$currentPage
				);

		parent::__construct(
			$items, 
			$total, 
			$perPage, 
			$currentPage, 
			$options
		);
	}
	
	public function sliceItems(
		$items,
		$limit,
		$currentPage
	)
	{
		
		return array_slice(
            $items,
            (isset($currentPage) ? ($currentPage * $limit) - $limit : 0),
            $limit
        );
	}
}