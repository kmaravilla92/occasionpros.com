<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\ProfessionalCategory as ProfessionalCategoryEntity;

class ProfessionalCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	'DJs',
        	'MCs',
        	'Musicians',
        	'Singers',
        	'Bands',
        	'Coordinators',
        	'Photo Booths',
        	'Photographers',
        	'Videographers',
        	'Florist',
        	'Officiant',
        	'Bartenders',
        	'Caterers',
        	'Taco Man',
        	'Magicians',
        	'Comedians',
        	'Limousines',
        	'Party Rental Companies'
        ];

        foreach($categories as $category){
        	$professional_category = new ProfessionalCategoryEntity();
        	$professional_category->title = $category;
        	$professional_category->save();
        }
    }
}
