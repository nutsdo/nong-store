<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:web');
    }

    public function profile(Request $request, $type='profile')
    {
        $my = $this->login_user;

        return view('front.user.profile',compact('my', 'type'));
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
     * 关注用户
     * */
    public function follow(Request $request)
    {

        if(!$this->login_user){
            $result = [
                'status'    => 201,
                'msg'       => '请先登录'
            ];
        }else{
            $follow_id = $request->only('author_id');
            $is_follow = DB::table('user_follow')->where('user_id',$this->login_user->id)
                            ->where('follow_id',$follow_id)->first();
            if($is_follow){
                $this->login_user->follows()->detach($follow_id);
                $result = [
                    'status'    => 200,
                    'text'      => '关注',
                    'msg'       => '已取消关注'
                ];
            }else{
                $this->login_user->follows()->attach($follow_id);
                $result = [
                    'status'    => 200,
                    'text'      => '取消关注',
                    'msg'       => '关注成功'
                ];
            }

        }

        return response()->json($result);
    }

    /*
     * 我的文章
     * */
    public function articles(Request $request, $type='')
    {

        switch($type){
            case 'draft':
                $status = 0;
                break;
            case 'published':
                $status = 1;
                break;
            case 'fail' :
                $status = 2;
                break;
            case 'review' :
                $status = 3;
                break;
            case 'publish':
                return view('front.user.article',compact('type'));
                break;
            default :
                break;
        }
        if(isset($status)){
            $articles = Article::where('status', $status)->paginate(20);
        }else{
            $articles = Article::paginate(20);
        }

        return view('front.user.article',compact('type','articles'));
    }


    /*
     * 文章编辑
     * */
    public function edit(Request $request, $id)
    {
        $type = 'edit';
        $article = Article::where('author_id',$this->login_user->id)->where('author_type','user')->find($id);
        return view('front.user.article',compact('type','article'));
    }

    /*
     * 我的收藏
     * */

    public function collections()
    {
        $collections = '';
    }
}
