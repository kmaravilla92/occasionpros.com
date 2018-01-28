<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\EventPost as EventPostEntity;

class EventPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EventPostEntity::class,20)->create()->each(function($event){
            $event->created_by = App\User::where('permissions','{"client":true}')->get()->random(1)->id;
            $event->save();
        });
    }
}
