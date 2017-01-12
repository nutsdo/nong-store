<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleCategoryController extends Controller
{
    //
    public function index(Request $request, $id=0)
    {
        if($id)
        {
            $category = ArticleCategory::where('is_banned',0)->find($id);
            $articles = Article::status()->where('category_id',$id)->orderBy('created_time','DESC')->paginate(15);
            if($request->ajax()){
                $list = view('front.article.partials.list')->with('list',$articles)->render();
                return response()->json([
                    'status_code'  =>  200,
                    'message'      => '获取成功',
                    'next'         => $articles->nextPageUrl(),
                    'data'         => $list
                ]);
            }

            return view('front.article-category.index',compact('category','articles'));
        }
        return redirect()->route('home');
    }
}
