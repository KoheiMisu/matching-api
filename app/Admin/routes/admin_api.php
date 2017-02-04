<?php
use Illuminate\Http\Request;

/**
 * api for admin panel
 */
$api = app('Dingo\Api\Routing\Router');

/**
 * authentication
 */
$api->version('v1', [], function ($api) {
    $api->group(['prefix' => 'admin', 'namespace' => 'App\Admin\Http\Controllers\Auth'], function ($api) {
        $api->get('/authenticate', 'AuthController@index');
        $api->post('/authenticate', 'AuthController@auth');
    });
});


$api->version('v1', ['namespace' => 'App\Admin\Http\Controllers\V1'], function ($api) {
    $api->group(['prefix' => 'admin'], function ($api) {
        $api->resource('users', 'UserController');
    });
});