<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

/*
 * 前台功能路由
 * */
Route::group(['middleware' => 'web'], function()
{

    Route::auth();

    Route::get('/', [
        'as'=>'home','uses'=>'HomeController@index'
    ]);

    Route::get('profile', [
        'as'=>'profile','uses'=>'Front\UserController@profile'
    ]);

    Route::get('collections', [
        'as'=>'collections','uses'=>'Front\UserController@collections'
    ]);

    Route::get('/home', 'Front\HomeController@index');

    Route::get('/category/{id?}', [
        'as'=>'article-category','uses'=>'Front\ArticleCategoryController@index'
    ]);

    Route::get('/article/{id}', [
        'as'=>'article.show','uses'=>'Front\ArticleController@show'
    ]);

    Route::post('/article/{id}/reply', [
        'as'=>'article.reply','uses'=>'Front\ArticleController@reply'
    ]);

    Route::get('/community/{id?}', [
        'as'=>'community-category','uses'=>'Front\CommunityCategoryController@index'
    ]);

    Route::controllers([
        //'category' => 'Front\ArticleCategoryController',
        'products' => 'Front\ProductController'
    ]);



});


/*
 * 后台控制面板
 * */

Route::group(['middleware' => ['web'],'prefix' => 'dashboard','namespace' => 'Dashboard'], function()
{
    //Route::auth();

    Route::get('auth/login', 'AuthController@getLogin');
    Route::post('auth/login', 'AuthController@postLogin');
    Route::get('auth/logout', 'AuthController@getLogout');
    Route::get('auth/register', 'AuthController@getRegister');
    Route::post('auth/register', 'AuthController@postRegister');

    //首页
    Route::get('/', [
        'as'=>'dashboard','uses'=>'DashboardController@index'
    ]);

    Route::resource('setting','SettingController');

    Route::resource('banner','BannerController');

    Route::resource('admin','AdminController');

    Route::patch('user/{user_id}/disabled', [
        'as'=> 'dashboard.user.disabled','uses'=>'UserController@disabled'
    ]);
    Route::resource('user','UserController');

    Route::get('role/{role_id}/permission', [
        'as'=> 'dashboard.role.permission','uses'=>'RoleController@permission'
    ]);
    Route::post('role/{role_id}/permission', [
        'as'=> 'dashboard.role.permission.update','uses'=>'RoleController@permissionUpdate'
    ]);

    Route::resource('role','RoleController');

    Route::resource('menu','MenuController');

    Route::resource('category','CategoryController');

    Route::resource('products','ProductController');

    Route::resource('brand','BrandController');

    Route::resource('orders','OrderController');

    Route::resource('article_category','ArticleCategoryController');

    Route::get('articles/{article_id}/comments', [
        'as'=> 'dashboard.articles.comments','uses'=>'ArticleController@comments'
    ]);

    Route::resource('articles','ArticleController');

    Route::resource('comments', 'CommentController');

    Route::resource('community-category', 'CommunityCategoryController');

    Route::resource('community-articles', 'CommunityArticlesController');

    Route::resource('pages','PageController');


});

Route::group(['middleware' => ['web']], function()
{
    //上传
    Route::post('upload', [
        'as' => 'upload', 'uses' => 'UploadController@upload'
    ]);

});
