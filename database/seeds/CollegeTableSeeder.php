<?php

use Illuminate\Database\Seeder;

class CollegeTableSeeder extends Seeder
{
    const COLLEGES = [
        '東京大学', '青山学院大学', '北海道大学',
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (self::COLLEGES as $collegeName) {
            factory(\App\Models\College::class)->create([
                'name' => $collegeName,
            ]);
        }
    }
}
