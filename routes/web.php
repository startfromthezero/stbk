<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/
//session的中间件
//Route::group(['middleware'=>'web'],function(){
//	Route::any('/session1', 'StudentController@session1');
//	Route::any('/session2', 'StudentController@session2');
//});
Route::get('test',function(){
	echo phpinfo();
});
////宣传页面
//Route::any('/activity0', 'StudentController@activity0');

//活动页面
//Route::group(['middleware'=>'activity'],function (){
//	Route::any('/activity1', 'StudentController@activity1');
//	Route::any('/activity2', 'StudentController@activity2');
//});
//
Route::get('/', 'ColumnController@index');
Route::get('column/{type?}/{state?}/{page?}', 'ColumnController@index');
Route::get('jie/add', 'ColumnController@create');
Route::get('jie/{id?}','ColumnController@jie');
//Route::any('/response', 'StudentController@response');
//Route::any('/request1', 'StudentController@request1');
//Route::any('/queue', 'StudentController@queue');
//Route::any('/cache1', 'StudentController@cache1');
//Route::any('/cache2', 'StudentController@cache2');
Route::any('/upload', 'StudentController@upload');
//Route::any('/mail', 'StudentController@mail');
Route::auth();
Route::group(['middleware'=>'auth'],function(){
	Route::get('jie/add', 'ColumnController@create');
	Route::get('home', function ()
	{
		return view('user/home');
	});
	Route::get('user/post', function ()
	{
		return view('user/post');
	});
	Route::get('user/message', function ()
	{
		return view('user/message');
	});
	Route::get('user/set', function ()
	{
		return view('user/set');
	});
	Route::get('user', function ()
	{
		return view('user/index');
	});
	Route::get('user/product', function ()
	{
		return view('user/product');
	});
});
//Route::group(['middleware'=>'auth','namespace'=>'Admin','prefix'=>'admin'],function(){
//	Route::get('/','HomeController@index');
//	Route::get('/show','HomeController@show');
	//Route::resource('article', 'ArticlesController');
//	Route::get('/article/show', 'ArticleController@show');
//	Route::resource('news', 'NewsController');
//	Route::get('/news/show', 'NewsController@show');
//});
//Route::get('article/{id}', 'ArticleController@show');
//Route::post('comment', 'CommentController@store');

//项目开始


