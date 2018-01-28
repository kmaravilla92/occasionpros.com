<?php

namespace App\Models\Repositories;

use App\Models\Entities\ProfessionalSelectedCategory as ProfessionalSelectedCategoryEntity;

class Professional extends BaseRepository
{

	public function __construct(ProfessionalSelectedCategoryEntity $selected_category)
	{
		$this->setEntity($selected_category);
	}

    public function search($queries = [])
    {
    	$category = isset($queries['category']) ? $queries['category'] : 0;
        
        return $this
                ->getEntity()
                ->join('professional_informations as pi','pi.user_id','=','professional_selected_categories.professional_information_id')
                ->join('users as u','u.id','=','pi.user_id')
                ->where(function($query)use($category){
                    $query
                        ->where('professional_selected_categories.professional_category_id',$category);
                })
                // ->select('pi.*','u.*')    
                ->get();
    }
}
