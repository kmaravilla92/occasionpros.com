<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\ProfessionalBidEvent as ProfessionalBidEventEntity;
use App\Models\Entities\ProfessionalInformation as ProfessionalInformationEntity;
use App\Models\Entities\EventPost as EventPostEntity;

class ProfessionalBidEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProfessionalBidEventEntity::class,50)->create()->each(function($bid){
        	$bid->professional_id = ProfessionalInformationEntity::all()->random(1)->id;
        	$bid->event_id = EventPostEntity::all()->random(1)->id;
        	$bid->save();
        });
    }
}
