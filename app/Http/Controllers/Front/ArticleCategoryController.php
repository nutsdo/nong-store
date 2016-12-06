<?php

namespace App\Http\Controllers\Front;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleCategoryController extends Controller
{
    //
    public function index($id=0)
    {
        if($id)
        {
            $category = ArticleCategory::with(['articles'=>function($query){
                $query->take(20)->orderBy('created_time','DESC');
            }])->find($id);
            return view('front.article-category.index',compact('category'));
        }
    }
}
