<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show($id)
    {
        Article::where('id',$id)->increment('views'); //阅读量加1

        $article = Article::with(['comments'=>function($query){
                                    $query->take(10);
                                }])->find($id);
//        dd($article);

        $views   = Article::where('author_id',$article->author_id)
                          ->where('author_type',$article->author_type)
                          ->sum('views');

        $comments_count = Comment::where('article_id',$id)->count();

        $hots = Article::orderBy('views','desc')->take(10)->get();

        $is_like = false;
        $is_collection = false;
        $is_follow = false;

        if($this->login_user){
            $is_like = Like::where('user_id',$this->login_user->id)
                ->where('like_type','article')->where('like_id',$id)->first();

            $is_collection = Collection::where('user_id',$this->login_user->id)
                ->where('collection_type','article')->where('collection_id',$id)->first();

            $is_follow = DB::table('user_follow')->where('user_id',$this->login_user->id)->where('follow_id',$article->author_id)->first();
        }

        return view('front.article.index',compact('article','views','comments_count','hots','is_like','is_collection','is_follow'));
    }

    public function reply(Request $request,$id)
    {
        $data = $request->except('_token','_method');
        $data['article_id'] = $id;
        $data['app_user_id']= Auth::guard('web')->user()->id;
        $do = Comment::create($data);
        if($do){
            return back();
        }
    }

    /*
     * 点赞
     * */
    public function like(Request $request, $id)
    {

        if(!$this->login_user){
            $result = [
                'status'    => 201,
                'msg'       => '请先登录'
            ];
        }else{
            $query = Like::where('user_id',$this->login_user->id)
                  ->where('like_type','article')->where('like_id',$id);
            if($query->first()){
                $query->delete();
                Article::find($id)->decrement('likes',1);
                $result = [
                    'status'    => 200,
                    'type'      => 'cancel',
                    'msg'       => '已取消点赞'
                ];
            }else{
                Like::create([
                    'user_id'   => $this->login_user->id,
                    'like_type' => 'article',
                    'like_id'   => $id
                ]);
                Article::find($id)->increment('likes',1);
                $result = [
                    'status'    => 200,
                    'type'      => 'success',
                    'msg'       => '点赞成功'
                ];
            }

        }

        return response()->json($result);
    }

    /*
     * 收藏
     * */
    public function collection(Request $request, $id)
    {

        if(!$this->login_user){
            $result = [
                'status'    => 201,
                'msg'       => '请先登录'
            ];
        }else{
            $query = Collection::where('user_id',$this->login_user->id)
                ->where('collection_type','article')->where('collection_id',$id);
            if($query->first()){
                $query->delete();
                Article::find($id)->decrement('collections',1);
                $result = [
                    'status'    => 200,
                    'type'      => 'cancel',
                    'msg'       => '已取消收藏'
                ];
            }else{
                Collection::create([
                    'user_id'         => $this->login_user->id,
                    'collection_type' => 'article',
                    'collection_id'   => $id
                ]);
                Article::find($id)->increment('collections',1);
                $result = [
                    'status'    => 200,
                    'type'      => 'success',
                    'msg'       => '收藏成功'
                ];
            }

        }

        return response()->json($result);
    }

    /*
     * 打赏
     * */
    public function reward()
    {

    }
}
