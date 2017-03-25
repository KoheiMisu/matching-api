<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(\App\Models\Team::class)->create([
            'name'                 => '1_test',
            'profile_image_path'   => '1_test',
            'practice_location'    => '1_test',
            'practice_day_of_week' => '月,火',
            'memo'                 => '1_test',
            'people'               => 25,
            'gender_ratio'         => '4.0',
            'drinking_ratio'       => '2.0',
            'seriousness'          => '3.5',
            'college_id'           => 1,
        ]);

        factory(\App\Models\Team::class)->create([
            'name'                 => '2_test',
            'profile_image_path'   => '2_test',
            'practice_location'    => '2_test',
            'practice_day_of_week' => '月,火',
            'memo'                 => '2_test',
            'people'               => 25,
            'gender_ratio'         => '4.0',
            'drinking_ratio'       => '2.0',
            'seriousness'          => '3.5',
            'college_id'           => 1,
        ]);
    }
}
