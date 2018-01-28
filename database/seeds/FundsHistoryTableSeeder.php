<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\FundHistory as FundHistoryEntity;
use App\Models\Entities\EventPost as EventPostEntity;
use App\User as UserEntity;

class FundsHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FundHistoryEntity::class, 100)->create()->each(function($event)
        {
            $event->owner_id = UserEntity::all()->random(1)->id;
            $event->event_id = EventPostEntity::all()->random(1)->id;
            $event->save();
        });
    }
}
