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

Route::get('/', function () {
    return view('welcome');
});
/**
*控制器路由
*/
Route::get('index', 'IndexController@index');
// Home模块下 三级模式
// Route::group(['namespace' => 'Home','prefix' => 'home'],function(){
// 	Route::group(['prefix' => 'index'],function (){
// 		Route::get('index','IndexController@index');
// 	});
// });

// Home模块下 三级模式 把id定义在路由中
Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {
    Route::group(['prefix' => 'index'], function () {
        Route::get('index/{id}', 'IndexController@index');
    });
});

Route::prefix('database')->group(function () {
    Route::get('insert', 'DatabaseController@insert');
    Route::get('get','DatabaseController@get');
});



/**
*模型路由
*/
Route::prefix('model')->group(function (){
	Route::get('index','ModelController@index');
	Route::get('get','ModelController@get');
	Route::get('store','ModelController@store');
	Route::get('update','ModelController@update');
	Route::get('delete', 'ModelController@delete');
	Route::get('restore', 'ModelController@restore');
	Route::get('forceDelete', 'ModelController@forceDelete');
});

/**
*视图路由
*/
Route::prefix('view')->group( function (){
	Route::get('index','ViewController@index');
	Route::get('create','ViewController@create');
	Route::post('store', 'ViewController@store');
	Route::get('edit/{id}', 'ViewController@edit');
	Route::post('update/{id}', 'ViewController@update');
	Route::get('destroy/{id}', 'ViewController@destroy');
	Route::get('restore/{id}', 'ViewController@restore');
	Route::get('forceDelete/{id}', 'ViewController@forceDelete');
});

/**
* admin
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],  function(){
	//首页控制器
	Route::group(['prefix' => 'index'], function (){
		//后台首页
		Route::get('index', 'IndexController@index');

	});

	//文章管理
	Route::group(['prefix' => 'article'], function (){
		Route::get('index', 'ArticleController@index');
		Route::get('create', 'ArticleController@create');
		Route::post('store', 'ArticleController@store');
		Route::get('edit/{id}', 'ArticleController@edit');
		Route::post('update/{id}', 'ArticleController@update');
		Route::get('destroy/{id}', 'ArticleController@destroy');


	});
	//分类管理
	Route::group(['prefix' => 'category'], function (){
		Route::get('index', 'CategoryController@index');
		Route::get('create', 'CategoryController@create');
		Route::post('store', 'CategoryController@store');
		Route::get('edit/{id}', 'CategoryController@edit');
		Route::post('update/{id}', 'CategoryController@update');
		Route::get('destroy/{id}', 'CategoryController@destroy');
	});
	//菜单管理
	Route::group(['prefix' => 'nav'], function (){
		Route::get('index', 'NavController@index');
		Route::get('create', 'NavController@create');
		Route::post('store', 'NavController@store');
		Route::get('edit/{id}', 'NavController@edit');
		Route::post('update/{id}', 'NavController@update');
		Route::get('destroy/{id}', 'NavController@destroy');
		Route::get('restore/{id}', 'NavController@restore');
		Route::get('forceDelete/{id}', 'NavController@forceDelete');
	});
	//标签管理
	Route::group(['prefix' => 'tag'], function (){
		Route::get('index', 'TagController@index');
		Route::get('create', 'TagController@create');
		Route::post('store', 'TagController@store');
		Route::get('edit/{id}', 'TagController@edit');
		Route::post('update/{id}', 'TagController@update');
		Route::get('destroy/{id}', 'TagController@destroy');
		Route::get('restore/{id}', 'TagController@restore');
		Route::get('forceDelete/{id}', 'TagController@forceDelete');
	});
	//评论管理
	Route::group(['prefix' => 'comment'], function (){
		Route::get('index', 'CommentController@index');
		Route::get('destroy/{id}', 'CommentController@destroy');
		Route::get('restore/{id}', 'CommentController@restore');
		Route::get('forceDelete/{id}', 'CommentController@forceDelete');
	});
	//用户管理
	Route::group(['prefix' => 'user'], function (){
		Route::get('index', 'UserController@index');
		Route::get('edit/{id}', 'UserController@edit');
		Route::post('update/{id}', 'UserController@update');
	});
	//第三方用户管理
	Route::group(['prefix' => 'oauthUser'] , function(){
		Route::get('index', 'OauthUserController@index');
		Route::get('create', 'OauthUserController@create');
		Route::post('store', 'OauthUserController@store');
		Route::get('edit/{id}', 'OauthUserController@edit');
		Route::post('update/{id}', 'OauthUserController@update');
		Route::get('destroy/{/id}', 'OauthUserController@destroy');
		Route::get('restore/{id}', 'OauthUserController@restore');
		Route::get('forceDelete/{id}', 'OauthUserController@forceDelete');

	});
	//友情链接
	Route::group(['prefix' => 'friendshipLink'] , function () {
		Route::get('index', 'FriendshipLinkController@index');
		Route::get('create', 'FriendshipLinkController@create');
		Route::post('store', 'FriendshipLinkController@store');
		Route::get('edit/{id}', 'FriendshipLinkController@edit');
		Route::post('update/{id}', 'FriendshipLinkController@update');
		Route::get('destroy/{id}', 'FriendshipLinkController@destroy');
		Route::get('restore/{id}', 'FriendshipLinkController@restore');
		Route::get('forceDelete/{id}', 'FriendshipLinkController@forceDelete');
	});
	//推荐博客
	Route::group(['prefix' => 'site'], function (){
		Route::get('index', 'SiteController@index');
		Route::get('create', 'SiteController@create');
		Route::post('store', 'SiteController@store');
		Route::get('edit/{id}', 'SiteController@edit');
		Route::post('update/{id}', 'SiteController@update');
		Route::get('destroy/{id}', 'SiteController@destroy');
		Route::get('restore/{id}', 'SiteController@restore');
		Route::get('forceDelete/{id}', 'SiteController@forceDelete');
	});
	//碎言碎语
	Route::group(['prefix' => 'chat'], function (){
		Route::get('index', 'ChatController@index');
		Route::get('create', 'ChatController@create');
		Route::post('store', 'ChatController@store');
		Route::get('edit/{id}', 'ChatController@edit');
		Route::post('update/{id}', 'ChatController@update');
		Route::get('destroy/{id}', 'ChatController@destroy');
		Route::get('restore/{id}', 'ChatController@restore');
		Route::get('forceDelete/{id}', 'ChatController@forceDelete');
	});
	//系统设置
	Route::group(['prefix' => 'config'], function (){
		Route::get('email', 'ConfigController@email');
		Route::get('oauth', 'ConfigController@oauth');
		Route::post('update', 'ConfigController@update');
		Route::get('qqQun', 'ConfigController@qqQun');
		Route::get('clear', 'ConfigController@clear');
		Route::get('edit', 'ConfigController@edit');
	});
	//开源项目
	 Route::group(['prefix' => 'gitProject'], function () {
        Route::get('index', 'GitProjectController@index');
        Route::get('create', 'GitProjectController@create');
        Route::post('store', 'GitProjectController@store');
        Route::get('edit/{id}', 'GitProjectController@edit');
        Route::post('update/{id}', 'GitProjectController@update');
        Route::post('sort', 'GitProjectController@sort');
        Route::get('destroy/{id}', 'GitProjectController@destroy');
        Route::get('restore/{id}', 'GitProjectController@restore');
        Route::get('forceDelete/{id}', 'GitProjectController@forceDelete');
    });



});