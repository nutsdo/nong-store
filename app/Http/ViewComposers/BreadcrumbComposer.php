<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/10/19
 * Time: 下午11:24
 */

namespace App\Http\ViewComposers;


use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class BreadcrumbComposer
{

    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //查询当前登录用户

        $currentRoute = Route::currentRouteName();
        $list = explode('.',$currentRoute);
        $route = '';
        for($i=0;$i<count($list)-1;$i++){
            if($i==0){
                $route .= $list[$i];
            }else{
                $route .= '.'.$list[$i];
            }
        }
        //dd($currentRoute);
        $route = $route.'.index';
        $breadcrumb = Menu::with('parent')->where('fun_route_name',$route)->first();
        $view->with('breadcrumb', $breadcrumb);
    }
}