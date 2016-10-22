<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends BaseController
{
    public $view_path = 'dashboard.role.';
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $roles = Role::paginate(15);
        return view($this->view_path.__FUNCTION__,compact('roles'));
    }

    public function create()
    {
        return view($this->view_path.__FUNCTION__);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'role_name'     => 'required',
            'display_name'     => 'required',
        ]);
        $data = $request->except('_token','_method');
        $res = Role::create($data);
        if($res){
            flash()->success('操作成功');
            return redirect()->route('dashboard.role.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit(Request $request, $id)
    {
        $role = Role::find($id);
        return view($this->view_path.__FUNCTION__,compact('role'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'role_name'     => 'required',
            'display_name'     => 'required',
        ]);
        $data = $request->except('_token','_method');
        $res = Role::find($id)->update($data);
        if($res){
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function permission($role_id)
    {
        $role = Role::find($role_id);
        $menus = Menu::defaultOrder()->get();//->toTree()
        //查看角色拥有的菜单权限
        $has_menus = $role->menus;
        foreach($menus as $k=>$menu){
            foreach($has_menus as $m){
                if($menu->id == $m->id){
                    $menus[$k]->can = 1;
                }
            }
        }
        $menus = $menus->toTree();

        return view($this->view_path.__FUNCTION__,compact('role','menus'));
    }

    public function permissionUpdate(Request $request,$role_id)
    {
        //删除所有的角色菜单
        $role = Role::find($role_id);
        $role->menus()->detach();
        //添加权限
        $menus = $request->input('sys_fun_id');
        //dd($menus);
        $role->menus()->attach($menus);

        flash()->success('操作成功');

        return redirect()->back();

    }
}

