<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 上午11:31
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->response->errorNotFound();
        }

        return $this->response->item($user);
    }

    public function follow(Request $request)
    {
        $user = Auth::guard('web')->user();
        $follow_type = 'user';
        $follow_id = $request->input('follow_id');

        if($user->id==$follow_id){
            $result = [
                'status_code'    => 201,
                'message'        => '不能订阅自己'
            ];
            return $result;
        }
        $follower = $user->follows()->where('follow_id', $follow_id)->first();

        if($follower){
            //取消关注
            $user->follows()->detach($follow_id, ['follow_type' => $follow_type]);
            $result = [
                'status_code'    => 200,
                'type'           => 'unfollow',
                'message'        => '取消关注成功'
            ];
        }else{
            //关注
            $user->follows()->attach($follow_id, ['follow_type' => $follow_type]);
            $result = [
                'status_code'    => 200,
                'type'           => 'followed',
                'message'        => '关注成功'
            ];
        }

        return $result;
    }

    public function profileUpdate(Request $request, $type)
    {
        if(!$type){
            return $this->response->error('参数错误', 400);
        }
        $user = Auth::guard('web')->user();
        switch($type){
            case 'profile':
                if($user->name) {
                    $inputs = ['nick_name','signature'];
                    $rule   = [
                        'nick_name' =>'required|unique:app_users,nick_name,'.$user->id,
                    ];

                } else {
                    $inputs = ['name','nick_name','signature'];
                    $rule   = [
                        'name'      =>'required|unique:app_users, name,'.$user->id,
                        'nick_name' =>'required|unique:app_users,nick_name,'.$user->id,
                    ];
                };
                break;
            case 'password':
                $inputs = ['old_password','password','password_confirmation'];
                if(!Hash::check($request->old_password, $user->password)){
                    return [
                        'status_code'   => 201,
                        'message'       =>'原密码错误'
                    ];
                }
                $rule   = [
                    'password' =>'required|min:6|confirmed',
                ];
                break;
            case 'avatar':
                $inputs = ['avatar'];
                $rule   = [
                    'avatar' =>'required',
                ];
                break;
            case 'phone':
                $inputs = ['phone'];
                $rule   = [
                    'phone' =>[
                        'required',
                        'regex' => '/^(1(([35][0-9])|(47)|[8][0126789]))\d{8}$/'
                    ],
                ];
                break;
            default:
                return [
                    'status_code'   => 201,
                    'message'       =>'类型错误'
                ];
                break;
        }

        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return [
                'status_code'   => 202,
                'message'       => $validator->messages()
            ];
        }
        $data = $request->only($inputs);
        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
        //dd($data);
        $user = User::find($user->id);

        if(User::where('id',$user->id)->update($data)){
            Auth::guard('web')->login($user);
            $result = [
                'status_code'    => 200,
                'message'        => '更新成功'
            ];
        }else{
            $result = [
                'status_code'    => 201,
                'message'        => '更新失败'
            ];
        }
        return $result;
    }

    public function apply(Request $request)
    {
        $type = $request->input('type');
        $user = Auth::guard('web')->user();
        $res = false;
        if($type=='author'){
            $res = User::where('id',$user->id)->update(['is_author'=>2]);
        }elseif($type=='experiencer'){
            $res = User::where('id',$user->id)->update(['is_experiencer'=>1]);
        }
        if($res){
            $result = [
                'status_code'    => 200,
                'message'        => '申请成功'
            ];
        }else{
            $result = [
                'status_code'    => 201,
                'message'        => '申请失败'
            ];
        }
        return $result;
    }
}