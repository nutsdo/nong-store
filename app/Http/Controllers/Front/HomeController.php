<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application Home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //banner
        $banners = Banner::orderBy('created_at','DESC')->take(7)->get();
        //最新
        $last_articles = Article::with('author')->orderBy('created_time','DESC')->take(12)->get();

        $hot_articles = Article::orderBy('views','DESC')->take(10)->get();

        return view('front.home.index',compact('banners','last_articles','hot_articles'));

    }
}
