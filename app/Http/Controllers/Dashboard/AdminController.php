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
            'admin_name'     => 'required',
            'password'       => 'required|confirmed',
            'admin_email'    => 'required|email|',
        ]);
        $data = $request->except('_token','_method');
        $data['password'] = Hash::make($data['password']);
        $res = Admin::create($data);
        if($res){
            flash()->success('操作成功');
            return redirect()->route('dashboard.admin.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();
        $data['is_create'] = false;
        return view($this->view_path.'edit',compact('admin','roles'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $update = Admin::find($id)->update($input);
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
