<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;

use App\Http\Requests;
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

        $article = Article::status()->with(['comments'=>function($query){
                                    $query->take(30);
                                }])->find($id);

        $views   = Article::status()->where('author_id',$article->author_id)
                          ->where('author_type',$article->author_type)
                          ->sum('views');

        //$comments_count = Comment::where('article_id',$id)->count();

        $hots = Article::status()->orderBy('views','desc')->take(10)->get();

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

        return view('front.article.index',compact('article','views','hots','is_like','is_collection','is_follow'));
    }

    public function reply(Request $request,$id)
    {
//        $data = $request->except('_token','_method');
//        $data['article_id'] = $id;
        $data['app_user_id']= Auth::guard('web')->user()->id;

        $comment_body = $request->input('comment_body');
        $comment = new Comment([
            'comment_body' => $comment_body,
            'app_user_id' => $data['app_user_id'],
        ]);

        $article = Article::find($id);

        $res = $article->comments()->save($comment);
        return [
            'status_code'   => 200,
            'message'       => '评论成功',
            'data'          => $res
        ];
    }

}
