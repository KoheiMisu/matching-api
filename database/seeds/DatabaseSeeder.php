<?php

use Illuminate\Database\Seeder;

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
        $this->call(UserPermissionTableSeeder::class);
        $this->call(TeamUserTableSeeder::class);
        $this->call(ScheduleCategoryTableSeeder::class);
        $this->call(TeamRequestTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
    }
}
