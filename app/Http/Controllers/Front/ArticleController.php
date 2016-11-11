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
        $article = Article::find($id);
        return view('front.article.index',compact('article'));
    }
}
