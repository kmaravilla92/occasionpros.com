<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            'Admins' => [
                'permissions'   =>  [
                    'admin' =>  true
                ]
            ],
            'Users' =>  [
                'permissions'   =>  [
                    'user'  =>  true
                ]
            ],
            'Clients'   =>  [
                'permissions'    =>  [
                    'client'    =>  true
                ]
            ],
            'Professionals' =>  [
                'permissions'    =>  [
                    'professional'    =>  true
                ]
            ]
        ];

        foreach($roles as $role_name => $role) {
            $role_slug = strtolower($role_name);
            Sentinel::getRoleRepository()->createModel()->create([
                'name'          => $role_name,
                'slug'          => $role_slug,
                'permissions'   => $role['permissions']
            ]);
        }
    }
}
