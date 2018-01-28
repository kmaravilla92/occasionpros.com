<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\EventType as EventTypeEntity;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Birthday',
            'Wedding',
            'Corporate',
            'Anniversary',
            'Holiday',
            'Concert',
            'Graduation',
            'Prom/School Dance',
            'House Party',
            'Religious',
            'General Events (everything else)',
        ];

        foreach($types as $type) {
            EventTypeEntity::create([
                'title'         => $type,
                'description'   => $type,
                'status'        => '1'
            ]);
        }
    }
}
