<?php

use Illuminate\Database\Seeder;

class TeamRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\TeamRequest::class)->create([
            'user_id' => 1,
            'team_id' => 1,
        ]);

        factory(\App\Models\TeamRequest::class)->create([
            'user_id' => 2,
            'team_id' => 1,
        ]);
    }
}
