<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
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

        return view('home',compact('banners','last_articles','hot_articles'));
    }
}
