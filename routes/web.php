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
//Route::get('test',function(){
//	echo phpinfo();
//});
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
//Route::post('jie/reply', 'CommentController@store');
//Route::any('/response', 'StudentController@response');
//Route::any('/request1', 'StudentController@request1');
//Route::any('/queue', 'StudentController@queue');
//Route::any('/cache1', 'StudentController@cache1');
//Route::any('/cache2', 'StudentController@cache2');
Route::post('comment/vote', 'CommentController@vote'); //评论点赞
Route::post('sign/in','SignController@in');
Route::post('user/qqlogin', 'UserController@qqlogin');
Route::any('/upload', 'StudentController@upload');
//Route::any('/mail', 'StudentController@mail');
Route::auth();
Route::group(['middleware'=>'auth'],function(){
	Route::get('jie/add', 'ColumnController@create');//发布文章页
	Route::any('jie/store', 'ColumnController@store');//发布文章
	Route::get('jie/edit/{id?}', 'ColumnController@edit');//编辑文章页
	Route::any('jie/update', 'ColumnController@update');//发布编辑文章
	Route::any('collect/{type?}','ColumnController@collect');//收藏文章

	//Route::any('test/','ColumnController@test');

	Route::any('comment/reply', 'CommentController@store');    //回复评论
	Route::post('comment/getDa','CommentController@getDa');//获取评论编辑页面
	Route::post('comment/updateDa','CommentController@updateDa'); //编辑评论

	Route::get('home', function ()
	{
		return view('user/home');
	});
	Route::get('user/post', 'UserController@post');
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
Route::any('jie/{id?}', 'ColumnController@jie');
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


