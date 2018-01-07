<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
Route::post('logout', 'LoginController@logout');

Route::get('/', 'IndexController@index');
Route::get('/show', 'IndexController@show');
//Route::get('index', ['as' => 'admin.index', 'uses' => function () {
//    return redirect('/admin/log-viewer');
//}]);
Route::group([
    'middleware' => [
        'menu',
    ]
], function ()
{
    Route::get('/getMenu', 'IndexController@getMenu');
});
Route::any('news/upload','NewsController@upload');
Route::group(['middleware' => ['auth:admin', 'menu', 'authAdmin']], function () {
	Route::get('permission/show', 'PermissionController@show');
    //权限管理路由
    Route::get('permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('permission/manage', ['as' => 'admin.permission.manage', 'uses' => 'PermissionController@index']);
    Route::get('permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('permission', 'PermissionController', ['names' => ['update' => 'admin.permission.edit', 'store' => 'admin.permission.create']]);


    //角色管理路由
    Route::get('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('role', 'RoleController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);


    //用户管理路由
    Route::get('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);  //用户管理
    Route::post('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('user', 'UserController', ['names' => ['update' => 'admin.role.edit', 'store' => 'admin.role.create']]);

    //文章管理路由
    Route::get('news/index', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);  //文章管理
    Route::post('news/index', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);
    Route::resource('news', 'NewsController', ['names' => ['update' => 'admin.news.edit', 'store' => 'admin.news.create']]);
});

//Route::get('/', function () {
//    return redirect('/admin/index');
//});

