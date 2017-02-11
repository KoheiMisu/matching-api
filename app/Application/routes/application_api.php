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
    $api->post('/auth/login', 'AuthController@auth');
});


$api->version('v1', ['prefix' => 'api/v1', 'namespace' => 'App\Application\Http\Controllers\V1', 'middleware' => 'cors'], function ($api) {
    $api->resource('users', 'UserController');
});