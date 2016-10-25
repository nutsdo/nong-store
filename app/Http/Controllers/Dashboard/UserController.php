<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $users = User::paginate(15);

        return view('dashboard.user.index',compact('users'));
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'           => 'required|alpha_dash|string|between:6,12|unique:app_users,name',
            'password'       => 'required|confirmed',
            'phone'          => 'required|numeric',
            'email'          => 'required|email|unique:app_users,email',
        ]);

        $data = $request->except('_token','_method');
        $data['password'] = Hash::make($data['password']);
        //dd($request->all());
        $res = User::create($data);
        if($res){
            flash()->success('操作成功');
            return redirect()->route('dashboard.user.index');
        }

        flash()->error('操作失败');

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('dashboard.user.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');
        $this->validate($request,[
            'name'           => 'required|alpha_dash|string|between:6,12|unique:app_users,name,'.$id,
            'phone'          => 'required|size:11',
            'email'          => 'required|email|unique:app_users,email,'.$id,
        ]);

        $res =  User::where('id',$id)->update($input);
        if($res){
            flash()->success('操作成功');
            return redirect()->route('dashboard.user.edit',$id);
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('dashboard.user.index');
    }
}
