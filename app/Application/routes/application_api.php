<?php
use Illuminate\Http\Request;

/**
 * api for admin panel
 */
$api = app('Dingo\Api\Routing\Router');

/**
 * authentication
 */
$api->version('v1', ['namespace' => 'App\Application\Http\Controllers\Auth'], function ($api) {
    $api->post('/auth/login', 'AuthController@auth');
});


$api->version('v1', ['namespace' => 'App\Application\Http\Controllers\V1'], function ($api) {
    $api->resource('users', 'UserController');
});