<?php

use Illuminate\Database\Seeder;
use ScheduleCategoryTableSeeder as ScheduleCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CollegeTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(UserProfileTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(ScheduleCategory::class);
    }
}
