<?php
use Illuminate\Http\Request;

/**
 * api for admin panel
 */
$api = app('Dingo\Api\Routing\Router');

/**
 * authentication
 */
$api->version('v1', ['prefix' => 'api/v1', 'namespace' => 'App\Application\Http\Controllers\Auth'], function ($api) {
    $api->post('/auth/fb_login', 'AuthController@storeFbUserData');
});


$api->version('v1',
    [
        'prefix' => 'api/v1',
        'namespace' => 'App\Application\Http\Controllers\V1',
        'middleware' => ['cors', 'api.auth']
    ],
    function ($api) {
        $api->get('/auth/authenticated_user', 'UserController@getAuthenticatedUser');
        $api->resource('users', 'UserController');
        $api->resource('user_profiles', 'UserProfileController');
        $api->resource('user_permission', 'UserPermissionController');
});