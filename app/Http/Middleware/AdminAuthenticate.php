<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            return redirect()->guest('dashboard/auth/login');
        }

        $admin = Auth::guard($guard)->user();
        if($admin->id==1){
            return $next($request);
        }
        if($admin->role->isEmpty()){
            return abort(404);
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
        $menus = $admin->role[0]->menus;
        $arr = [];
        foreach($menus as $k=>$menu)
        {
            $route_name = explode('.index',$menu->fun_route_name);
            $arr[$k] = $route_name[0];
        }
        $arr = array_merge(['dashboard'],$arr);
        $route = $route?$route:'dashboard';
        if(!in_array($route,$arr)){
            return abort(404);
        }
        //dd($currentRoute);
        return $next($request);
    }
}
