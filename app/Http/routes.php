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

    Route::get('/about','Front\PagesController@about')->name('about');

    Route::get('/contribute','Front\PagesController@contribute')->name('contribute');

    Route::get('/suggestions','Front\PagesController@suggestions')->name('suggestions');

    Route::get('/statement','Front\PagesController@statement')->name('statement');

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

    Route::resource('supplier','SupplierController');

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

Route::group(['middleware'=>['api']], function(){

    Route::post('/article/{id}/like', [
        'as'=>'article.like','uses'=>'Front\ArticleController@like'
    ]);

    Route::post('/article/{id}/collection', [
        'as'=>'article.collection','uses'=>'Front\ArticleController@collection'
    ]);

    Route::post('/user/follow', [
        'as'=>'user.follow','uses'=>'Front\UserController@follow'
    ]);

});
Route::group(['middleware'=>['api']], function(){

});
$api = app('Dingo\Api\Routing\Router');

$api->version('local',['middleware' => ['web'], 'namespace' => 'App\Http\Api\Local\Controllers'], function ($api) {
    //登录接口
    $api->any('login',[
        'as'    => 'api.login',
        'uses'  => 'AuthController@login'
    ]);
    //注册接口
    $api->post('register',[
        'as'    => 'api.register',
        'uses'  => 'AuthController@register'
    ]);
    //文章接口
    $api->get('article/{id}/show', [
        'as'    => 'api.article.show',
        'uses'  => 'ArticleController@show'
    ]);
    //文章列表
    $api->get('articles', [
        'as'    => 'api.article.index',
        'uses'  => 'ArticleController@index'
    ]);
    //文章分类接口
    $api->get('categories', [
        'as'    => 'api.categories.index',
        'uses'  => 'CategoryController@index'
    ]);
    //获取分类文章接口
    $api->get('category/{id}/articles', [
        'as'    => 'api.categories.articles',
        'uses'  => 'ArticleController@getArticlesByCategoryId'
    ]);

    /*
     * 登录后操作
     * */
    $api->group(['middleware' => ['oauth:web']] ,function($api){
        //用户信息接口
        $api->get('user',[
            'as'    =>  'api.user.show',
            'uses'  =>  'UserController@show'
        ]);
        //关注和取消关注接口
        $api->post('user/follow', [
            'as'    =>  'api.user.follow',
            'uses'  =>  'UserController@follow'
        ]);
        //更新用户信息接口

        //重置密码接口

        //评论接口
        $api->post('article/comment', [
            'as'    =>  'api.user.comment',
            'uses'  =>  'ArticleController@comment'
        ]);
        //删除评论接口

        //点赞和取消点赞接口
        $api->post('article/like', [
            'as'    =>  'api.article.like',
            'uses'  =>  'ArticleController@doLike'
        ]);
        //收藏和取消收藏接口
        $api->post('article/collect', [
            'as'    =>  'api.article.collect',
            'uses'  =>  'ArticleController@doCollect'
        ]);
    });

});