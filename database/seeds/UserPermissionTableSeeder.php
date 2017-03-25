<?php

use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\UserPermission::class)->create([
            'user_id' => 1,
            'team_id' => 1,
            'type'    => 'captain',
        ]);

        factory(\App\Models\UserPermission::class)->create([
            'user_id' => 1,
            'team_id' => null,
            'type'    => 'captain',
        ]);
    }
}
