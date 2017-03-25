<?php

use Illuminate\Database\Seeder;

class ScheduleCategoryTableSeeder extends Seeder
{
    const PRACTICE = [
        '練習', '練習試合', '公式戦',
    ];

    const EVENT = [
        '飲み会', '納会',
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (self::PRACTICE as $name) {
            factory(\App\Models\ScheduleCategory::class)->create([
                'category_name' => $name,
                'type'          => 'practice',
            ]);
        }

        foreach (self::EVENT as $name) {
            factory(\App\Models\ScheduleCategory::class)->create([
                'category_name' => $name,
                'type'          => 'event',
            ]);
        }
    }
}
