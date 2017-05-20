<?php

use Illuminate\Database\Seeder;

class TeamUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\TeamUser::class)->create([
            'user_id' => 1,
            'team_id' => 1,
        ]);

        factory(\App\Models\TeamUser::class)->create([
            'user_id' => 1,
            'team_id' => 2,
        ]);

        factory(\App\Models\TeamUser::class)->create([
            'user_id' => 6,
            'team_id' => 1,
        ]);

        factory(\App\Models\TeamUser::class)->create([
            'user_id' => 6,
            'team_id' => 2,
        ]);
    }
}
