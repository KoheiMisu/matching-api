<?php

use App\Models\UserPermission as UP;

/**
 * api for admin panel.
 */
$api = app('Dingo\Api\Routing\Router');

/*
 * authentication
 */
$api->version('v1',
    [
        'prefix'    => 'api/v1',
        'namespace' => 'App\Application\Http\Controllers\Auth',
    ], function ($api) {
        $api->post('/auth/fb_login',
            [
                'as'   => 'auth.fb_login',
                'uses' => 'AuthController@storeFbUserData',
            ]
        );
    });

$api->version('v1',
    [
        'prefix'     => 'api/v1',
        'namespace'  => 'App\Application\Http\Controllers\V1',
        'middleware' => ['cors', 'api.auth', 'bindings', 'jwt.test'],
    ],
    function ($api) {
        $api->get('/auth/authenticated_user',
            [
                'as'   => 'auth.get_user',
                'uses' => 'UserController@getAuthenticatedUser',
            ]
        );

        $api->resource('users', 'UserController');
        $api->resource('userProfiles', 'UserProfileController');
        $api->resource('userPermissions', 'UserPermissionController'); //modelの名前に合わせないとbindingsが動かない

        $api->group(['prefix' => 'teams'], function ($api) {
            $api->post('/', [
                'as'         => 'teams.store',
                'middleware' => ['can:createTeam'],
                'uses'       => 'TeamController@store',
            ]);
            $api->get('/{team}', [
                'as'         => 'teams.show',
                'middleware' => UP::getAllGatePermission(),
                'uses'       => 'TeamController@show',
            ]);
            $api->put('/{team}', [
                'as'         => 'teams.update',
                'middleware' => [
                    UP::getGatePermissionByType(UP::CAPTAIN),
                    UP::getGatePermissionByType(UP::TEAM),
                ],
                'uses' => 'TeamController@update',
            ]);
        });

        $api->group(['prefix' => 'teams'], function ($api) {
            $api->get('/', [
                'as'   => 'teams.index',
                'uses' => 'TeamController@index',
            ]);
            $api->post('/', [
                'as'         => 'teams.store',
                'middleware' => ['can:createTeam'],
                'uses'       => 'TeamController@store',
            ]);
            $api->get('/{team}', [
                'as'         => 'teams.show',
                'middleware' => UP::getAllGatePermission(),
                'uses'       => 'TeamController@show',
            ]);
            $api->put('/{team}', [
                'as'         => 'teams.update',
                'middleware' => [
                    UP::getGatePermissionByType(UP::CAPTAIN),
                    UP::getGatePermissionByType(UP::TEAM),
                ],
                'uses' => 'TeamController@update',
            ]);
        });

        $api->group(['prefix' => 'schedules'], function ($api) {
            $api->get('/', [
                'as'   => 'schedules.index',
                'uses' => 'ScheduleController@index',
            ]);

            $api->group([
                'middleware' => [
                    UP::getGatePermissionByType(UP::CAPTAIN),
                    UP::getGatePermissionByType(UP::SCHEDULE),
                ],
            ], function ($api) {
                $api->post('/', [
                    'as'   => 'schedules.store',
                    'uses' => 'ScheduleController@store',
                ]);
                $api->get('/{schedule}', [
                    'as'   => 'schedules.show',
                    'uses' => 'ScheduleController@show',
                ]);
                $api->put('/{schedule}', [
                    'as'   => 'schedules.update',
                    'uses' => 'ScheduleController@update',
                ]);
                $api->delete('/{schedule}', [
                    'as'   => 'schedules.destroy',
                    'uses' => 'ScheduleController@destroy',
                ]);
            });
        });

        $api->group(['prefix' => 'teamRequests'], function ($api) {
            $api->get('/', [
                'as'   => 'teamRequests.index',
                'uses' => 'TeamRequestController@index',
            ]);

            $api->group([
                'middleware' => [
                    UP::getGatePermissionByType(UP::CAPTAIN),
                ],
            ], function ($api) {
                $api->post('/', [
                    'as'   => 'teamRequests.store',
                    'uses' => 'TeamRequestController@store',
                ]);
                $api->put('/{teamRequest}', [
                    'as'   => 'teamRequests.update',
                    'uses' => 'TeamRequestController@update',
                ]);
                $api->delete('/{teamRequest}', [
                    'as'   => 'teamRequests.destroy',
                    'uses' => 'TeamRequestController@destroy',
                ]);
            });
        });
    });
