<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $login_user;

    public function __construct()
    {
        $this->middleware('auth:web');
        $this->login_user = Auth::guard('web')->user();

    }

    public function profile()
    {
        $my = $this->login_user;
        return view('front.user.profile',compact('my'));
    }

    public function update(Requests\UserPostRequest $request)
    {
        $input = $request->except('_token','_method');
        $user = User::find($this->login_user->id);
        $update = $user->update($input);
        if($update){
            $result = [
                'status'    => 200,
                'msg'       => '更新成功！'
            ];

        }else{
            $result = [
                'status'    => 201,
                'msg'       => '更新失败！'
            ];
        }
        return response()->json($result);
    }

    /*
     * 我的收藏
     * */

    public function collections()
    {
        $collections = '';
    }
}
