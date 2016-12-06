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

class CommonComposer
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
        $admin = Auth::guard('admin')->user();
        if($admin->admin_name=='admin'){
            $menus = Menu::orderBy('sort', 'ASC')->get()->toTree();
        }else{
            if($admin->role){

                $ids = DB::table('sys_role_function')->where('sys_role_id',$admin->role[0]->id)->pluck('sys_fun_id');
                $menus = Menu::orderBy('sort', 'ASC')->whereIn('id',$ids)->get()->toTree();

            }

        }
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

        $route = $route.'.index';

        $view->with('currentRoute', $route)
             ->with('trees', $menus);
    }
}