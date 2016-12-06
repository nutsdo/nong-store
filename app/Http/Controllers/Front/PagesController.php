<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    //关于我们
    public function about()
    {
        return view('front.pages.about');
    }

    //投稿
    public function contribute()
    {
        return view('front.pages.contribute');
    }

    public function suggestion()
    {
        return view('front.pages.suggestion');
    }

    public function statement()
    {
        return view('front.pages.statement');
    }
}
