<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /** 新入生ユーザアカウント数 */
    const NEW_USER_LIMIT = 2;

    /** 通常アカウントユーザ数 */
    const NORMAL_USER_LIMIT = 2;

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $incrementNum = 1;

        /*
         * 新入生
         */
        for ($i = 1; $i <= self::NEW_USER_LIMIT; ++$i) {
            $fbName = $incrementNum.'_testUser';
            $fbId   = $incrementNum.'_testUser';

            factory(\App\Models\User::class)->create([
                'fb_name' => $fbName,
                'fb_id'   => $fbId,
            ]);
            ++$incrementNum;
        }

        /*
         * 通常ユーザー
         */
        for ($i = 1; $i <= self::NORMAL_USER_LIMIT; ++$i) {
            $fbName = $incrementNum.'_testUser';
            $fbId   = $incrementNum.'_testUser';

            factory(\App\Models\User::class)->create([
                'fb_name' => $fbName,
                'fb_id'   => $fbId,
            ]);
            ++$incrementNum;
        }

        /*
         * プロフィールのないユーザー
         */
        factory(\App\Models\User::class)->create([
            'fb_name' => 'not_profileUSer',
            'fb_id'   => 'not_profileUSer',
        ]);
    }
}
