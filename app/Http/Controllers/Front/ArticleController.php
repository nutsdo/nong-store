<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function show($id)
    {
        Article::where('id',$id)->increment('views'); //阅读量加1

        $article = Article::find($id);
        $views   = Article::where('author_id',$article->author_id)
                          ->where('author_type',$article->author_type)->sum('views');
        return view('front.article.index',compact('article','views'));
    }
}
