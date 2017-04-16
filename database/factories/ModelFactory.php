<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Models\User;
use App\Models\College;
use App\Models\Team;
use App\Models\UserProfile;
use App\Models\TeamUser;
use App\Models\ScheduleCategory;
use App\Models\UserPermission;
use App\Models\TeamRequest;
use App\Models\Schedule;

/*
 * @return \App\Models\User
 */
$factory->define(User::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return \App\Models\College
 */
$factory->define(College::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return Team
 */
$factory->define(Team::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return UserProfile
 */
$factory->define(UserProfile::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return UserPermission
 */
$factory->define(UserPermission::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return TeamUser
 */
$factory->define(TeamUser::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return ScheduleCategory
 */
$factory->define(ScheduleCategory::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return TeamRequest
 */
$factory->define(TeamRequest::class, function (Faker\Generator $faker) {
    return [];
});

/*
 * @return Schedule
 */
$factory->define(Schedule::class, function (Faker\Generator $faker) {
    return [
        'team_id'              => '',
        'category_id'          => 1,
        'memo'                 => $faker->paragraph(),
        'scope'                => 'open',
        'location'             => $faker->address,
        'start_time'           => $faker->date('Y-m-d h:i:s'),
        'end_time'             => $faker->date('Y-m-d h:i:s'),
        'last_updated_user_id' => 1,
    ];
});
