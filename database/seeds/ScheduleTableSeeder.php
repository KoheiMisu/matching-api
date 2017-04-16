<?php

use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $teamIds = [1, 2];

        foreach ($teamIds as $id) {
            factory(App\Models\Schedule::class)->create([
                'team_id' => $id,
            ]);
        }
    }
}
