<?php

use Illuminate\Database\Seeder;
use App\Models\Entities\MembershipPackage as MembershipPackageEntity;

class MembershipPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $memberships = [
            'Bronze' => [
                'description' => '',
                'options' => json_encode([
                    'price' => 19.99,
                    'max_bids' => 6,
                    'max_categories' => 2
                ])
            ],
            'Silver' => [
                'description' => '',
                'options' => json_encode([
                    'price' => 39.99,
                    'max_bids' => 13,
                    'max_categories' => 10
                ])
            ],
            'Gold' => [
                'description' => '',
                'options' => json_encode([
                    'price' => 59.99,
                    'max_bids' => 20,
                    'max_categories' => 15
                ])
            ]
        ];

        foreach($memberships as $title => $membership) {
            $membership['title'] = $title;
            MembershipPackageEntity::create($membership);
        }
    }
}
