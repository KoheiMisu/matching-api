<?php
use Illuminate\Http\Request;

/**
 * api for admin panel
 */

//Route::resource('user', 'UserController');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Admin\Http\Controllers\V1'], function ($api) {
    $api->resource('users', 'UserController');
});