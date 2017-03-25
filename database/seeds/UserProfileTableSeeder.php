<?php

use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $incrementNum = 1;

        /*
         * 新入生
         */
        for ($i = 1; $i <= UserTableSeeder::NEW_USER_LIMIT; ++$i) {
            $name = $incrementNum.'_profile_testUser';

            factory(\App\Models\UserProfile::class)->create([
                'user_id'    => $incrementNum,
                'college_id' => $i,
                'name'       => $name,
                'grade'      => 1,
            ]);

            ++$incrementNum;
        }

        /*
         * 通常ユーザー
         */
        for ($i = 1; $i <= UserTableSeeder::NORMAL_USER_LIMIT; ++$i) {
            $name = $incrementNum.'_profile_testUser';

            factory(\App\Models\UserProfile::class)->create([
                'name'       => $name,
                'college_id' => $i,
                'user_id'    => $incrementNum,
                'grade'      => 2,
            ]);

            ++$incrementNum;
        }
    }
}
