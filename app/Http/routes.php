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

    Route::group(['namespace' => 'Front'], function()
    {
        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/category/{id?}', [
            'as'=>'article-category','uses'=>'ArticleCategoryController@index'
        ]);

        Route::get('/article/{id}', [
            'as'=>'article.show','uses'=>'ArticleController@show'
        ]);

        Route::post('/article/{id}/reply', [
            'as'=>'article.reply','uses'=>'ArticleController@reply'
        ]);

        Route::get('/community/{id?}', [
            'as'=>'community-category','uses'=>'CommunityCategoryController@index'
        ]);

        //帖子
        //发帖
        Route::get('/posts/create', [
            'as'=>'posts.create',
            'uses'=>'CommunityArticleController@create'
        ]);
        Route::get('/posts/{id}/edit', [
            'as'=>'posts.edit',
            'uses'=>'CommunityArticleController@edit'
        ]);

        //保存帖子
        Route::post('/posts', [
            'as'=>'posts.store','uses'=>'CommunityArticleController@store'
        ]);
        //更新帖子
        Route::post('/posts/{id}', [
            'as'=>'posts.update','uses'=>'CommunityArticleController@update'
        ]);

        // 删除帖子
        Route::delete('/posts/{id}', [
            'as'=>'posts.destroy','uses'=>'CommunityArticleController@destroy'
        ]);

        Route::get('/posts/{id?}', [
            'as'=>'posts.show','uses'=>'CommunityArticleController@show'
        ]);

        Route::post('/posts/{id}/comment', [
            'as'=>'posts.reply','uses'=>'CommunityArticleController@reply'
        ]);



        //体验师
        Route::get('/experience', [
            'as'=>'experience','uses'=>'ExperienceController@index'
        ]);
        //体验文章
        Route::get('/experience/create', [
            'as'=>'experience.create','uses'=>'ExperienceController@create'
        ]);
        //体验师申请
        Route::get('/experience/apply', 'ExperienceApplyController@apply')->name('experience.apply');
        Route::post('/experience/apply', 'ExperienceApplyController@store')->name('experience.store');

        //
        Route::controllers([
            //'category' => 'Front\ArticleCategoryController',
            'products' => 'ProductController'
        ]);

        /*
         * 用户主页
         * */
        Route::get('/u/{id}','UcenterController@index')->name('ucenter');
        Route::get('/u/{id}/article','UcenterController@article')->name('ucenter.article');
        Route::get('/u/{id}/posts','UcenterController@posts')->name('ucenter.posts');

        /*
         *  单页
         * */
        Route::get('/about','PagesController@about')->name('about');

        Route::get('/contribute','PagesController@contribute')->name('contribute');

        Route::get('/suggestions','PagesController@suggestions')->name('suggestions');

        Route::get('/statement','PagesController@statement')->name('statement');
    });

    Route::group(['prefix' => 'user','namespace' => 'Front'],function(){

        Route::get('profile/{type?}', [
            'as'=>'user.profile','uses'=>'UserController@profile'
        ]);

        Route::get('article/{type?}', [
            'as'=>'user.article','uses'=>'UserController@articles'
        ]);

        Route::get('article/{id}/edit', [
            'as'=>'user.article.edit','uses'=>'UserController@edit'
        ]);

        Route::get('collections/{type?}', [
            'as'=>'user.collections','uses'=>'UserController@collections'
        ]);

        Route::get('comments/{type?}', [
            'as'=>'user.comments','uses'=>'UserController@comments'
        ]);

    });
    Route::group(['prefix' => 'store','namespace' => 'Store'],function(){

        Route::get('/', function(){
            return '工程师努力开发中...';
        })->name('store');

    });

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

    Route::get('comment/{comment_id}/check', [
        'as'=> 'dashboard.comment.check','uses'=>'CommentController@check'
    ]);

    Route::resource('comment', 'CommentController');

    Route::resource('community-category', 'CommunityCategoryController');

    Route::resource('community-articles', 'CommunityArticlesController');

    Route::resource('pages','PageController');


});

Route::group(['middleware' => ['web']], function()
{
    //上传
    Route::any('upload', [
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
        //订阅和取消订阅接口
        $api->post('user/follow', [
            'as'    =>  'api.user.follow',
            'uses'  =>  'UserController@follow'
        ]);
        //更新用户信息接口
        $api->put('user/profile/{type?}', [
            'as'    =>  'api.user.profile',
            'uses'  =>  'UserController@profileUpdate'
        ]);
        //申请成为作者／体验师接口
        $api->post('user/apply', [
            'as'    =>  'api.user.apply',
            'uses'  =>  'UserController@apply'
        ]);
        //重置密码接口

        //保存文章接口
        $api->post('article/store', [
            'as'    =>  'api.article.store',
            'uses'  =>  'ArticleController@store'
        ]);
        //更新文章接口
        $api->put('article/{id}', [
            'as'    =>  'api.article.update',
            'uses'  =>  'ArticleController@update'
        ]);

        //评论接口
        $api->post('article/comment', [
            'as'    =>  'api.article.comment',
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