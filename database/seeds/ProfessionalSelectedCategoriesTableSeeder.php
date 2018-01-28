<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\ProfessionalInformation as ProfessionalInformationEntity;
use App\Models\Entities\ProfessionalSelectedCategory as ProfessionalSelectedCategoryEntity;
use App\Models\Entities\ProfessionalCategory as ProfessionalCategoryEntity;

class ProfessionalSelectedCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProfessionalSelectedCategoryEntity::class,200)->create()->each(function($selected_category){
        	$selected_category->professional_information_id = ProfessionalInformationEntity::all()->random(1)->id;
        	$selected_category->professional_category_id = ProfessionalCategoryEntity::all()->random(1)->id;
        	$selected_category->save();
        });
    }
}
