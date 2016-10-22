<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends BaseController
{
    protected $view_path = 'dashboard.admin.';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $admins = Admin::paginate(20);
        return view('dashboard.admin.index',compact('admins'));
    }

    public function create()
    {
        $data['is_create'] = true;
        $roles = Role::select('id','role_name')->get();
        $roles = $this->toOptionArray($roles);
        //dd($roles);
        return view($this->view_path.'create',compact('roles','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'admin_name'     => 'required|exists:sys_users,admin_name',
            'password'       => 'required|confirmed',
            'role_id'        => 'required|numeric|min:1',
            'admin_email'    => 'required|email|exists:sys_users,admin_email',
        ]);
        $roleId = $request->input('role_id');
        $data = $request->except('_token','_method');
        $data['password'] = Hash::make($data['password']);
        //dd($request->all());
        $res = Admin::create($data);
        if($res){
            $res->role()->attach($roleId);
            flash()->success('操作成功');
            return redirect()->route('dashboard.admin.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $admin = Admin::with(['role'])->find($id);
        //dd($admin->role);
        if(!$admin->role->isEmpty()) $role_id = $admin->role[0]->id;
        else $role_id = 0;
        $roles = Role::all();
        $roles = $this->toOptionArray($roles);
        $data['is_create'] = false;
        return view($this->view_path.'edit',compact('admin','roles','role_id'));
    }

    public function update(Request $request,$id)
    {

        $input = $request->except('_token','_method');
        //dd($input);
        $roleId = $request->input('role_id');
        $this->validate($request,[
            'admin_name'     => 'required|exists:sys_users,admin_name',
            'role_id'        => 'required|numeric|min:1',
            'admin_email'    => 'required|email|exists:sys_users,admin_email',
        ]);
        $admin = Admin::find($id);
        $res = $admin->update($input);
        if($res){
            if(!$admin->role->isEmpty()) {
                $role_id = $admin->role[0]->id;
                $admin->role()->detach($role_id);
            }

            $admin->role()->attach($roleId);
            flash()->success('操作成功');
            return redirect()->route('dashboard.admin.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function toOptionArray(Collection $collection)
    {
        $array = [];
        foreach($collection as $item){
            $array[$item->id] = $item->role_name;
        }

        return $array;

    }
}
