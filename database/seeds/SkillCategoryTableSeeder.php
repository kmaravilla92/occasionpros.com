<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\SkillCategory as SkillCategoryEntity;

class SkillCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SkillCategoryEntity::class,25)->create()->each(function($parent_category){
            factory(SkillCategoryEntity::class,rand(5,10))->create()->each(function($sub_category)use($parent_category){
                $sub_category->parent = $parent_category->id;
                $sub_category->save();
            });
        });
    }
}
