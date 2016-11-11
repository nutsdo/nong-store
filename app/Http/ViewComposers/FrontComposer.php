<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/11/7
 * Time: 下午11:20
 */

namespace App\Http\ViewComposers;


use App\Models\ArticleCategory;
use App\Models\CommunityCategory;
use App\Models\Settings;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class FrontComposer
{
    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $currentRoute = Route::currentRouteName();

        //查询分类
        $articleCategory = ArticleCategory::all()->toTree();
        //社区分类
        $communityCategory = CommunityCategory::all()->toTree();

        //查询配置项
        $settings = Settings::all();

        foreach($settings as $key=>$value){
            $options[$value['name']] = $value['value'];
        }

        //查询登录用户
        $user = Auth::guard('web')->user();

        $view->with('loginUser', $user)->with('currentRoute', $currentRoute)
             ->with('articleCategory', $articleCategory)
             ->with('communityCategory', $communityCategory)
             ->with($options);
    }
}