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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('welcome');
});

/*
 * 前台功能路由
 * */
Route::group(['middleware' => 'web'], function()
{

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::controllers([
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

    Route::resource('admin','AdminController');

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

