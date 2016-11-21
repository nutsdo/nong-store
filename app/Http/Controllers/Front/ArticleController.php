<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
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

        return view('front.article.index',compact('article','views','comments_count','hots'));
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
    public function like()
    {

    }

    /*
     * 收藏
     * */
    public function collection()
    {

    }

    /*
     * 打赏
     * */
    public function reward()
    {

    }
}
