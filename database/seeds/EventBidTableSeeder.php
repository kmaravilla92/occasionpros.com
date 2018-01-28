<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\EventBid as EventBidEntity;
use App\Models\Entities\EventPost as EventPostEntity;

class EventBidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EventBidEntity::class,25)->create()->each(function($event_bid){
            $event_bid->event_id = EventPostEntity::get()->random(1)->id;
            $event_bid->save();
        });
    }
}
