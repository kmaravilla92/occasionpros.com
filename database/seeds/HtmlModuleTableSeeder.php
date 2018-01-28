<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\HtmlModule as HtmlMouleEntity;

class HtmlModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html_modules_to_create = [
        	[
        		'title' => 'Blog pages header'
        	]
       	];

        foreach($html_modules_to_create as $html_module_to_create){
        	HtmlMouleEntity::create($html_module_to_create);
        }
    }
}
