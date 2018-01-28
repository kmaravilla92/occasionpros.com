<?php

use Illuminate\Database\Seeder;

use App\Models\Entities\Testimonial as TestimonialEntity;
use App\Models\Entities\EventPost as EventPostEntity;
use App\User as UserEntity;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TestimonialEntity::class, 150)->create()->each(function($testimonial)
    	{
    		$testimonial->event_id 		= EventPostEntity::get()->random(1)->id;
    		$testimonial->created_for 	= UserEntity::get()->random(1)->id;
    		$testimonial->created_by 	= UserEntity::get()->random(1)->id;
    		$testimonial->save();
    	});
    }
}
