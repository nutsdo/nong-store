<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 上午11:31
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}