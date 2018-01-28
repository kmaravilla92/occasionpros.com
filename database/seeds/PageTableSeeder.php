<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\Page as PageEntity;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages_to_create = [
        	[
        		'title' => 'FAQ'
        	],
        	[
        		'title' => 'Privacy Policy'
        	],
        	[
        		'title' => 'Terms of Use'
        	],
            [
                'title' => 'Blog'
            ]
       	];

        foreach($pages_to_create as $page_to_create){
        	PageEntity::create($page_to_create);
        }
    }
}
