<?php

use Illuminate\Http\Request;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => 'serializer:array',
], function ($api) {
    // 获取 token
    $api->post('authorizations', 'AuthorizationController@store')
        ->name('api.authorizations.store');
    // 刷新 token
    $api->put('authorizations/current', 'AuthorizationController@update')
        ->name('api.authorizations.update');
    // 注销token
    $api->delete('authorizations/current', 'AuthorizationController@destroy')
        ->name('api.authorizations.destroy');

    $api->group(['middleware' => 'api.auth'], function ($api) {
        //  当前用户信息
        $api->get('user', 'UserController@userShow')->name('api.user.show');

        $api->get('users', 'UserController@index')->name('api.users.index');
        $api->get('users/{id}', 'UserController@show')->name('api.user.show');
    });
});
