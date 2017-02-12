<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\ExperienceArticle;
use Illuminate\Http\Request;


class BlogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth:web');
        $this->user = $this->login_user;
    }

    public function index()
    {
        $blog = Blog::where('user_id', $this->user->id)->first();

        if ($blog){

            $articles = ExperienceArticle::where('user_id', $this->user->id)->paginate(20);

            return view('front.blogs.index', compact('articles', 'blog'));

        }else{
            return redirect()->route('user.blogs.create');
        }
    }

    public function create()
    {

        $blog = Blog::firstOrNew(['user_id' => $this->user->id]);

        if($blog->id){

            return redirect()->route('user.blogs.edit', compact('blog'));

        }

        return view('front.blogs.create', compact('user', 'blog'));
    }

    public function store(BlogRequest $request)
    {
        $blog = new Blog();
        $request->performUpdate($blog);
        return redirect()->route('user.blogs.index');
    }

    public function edit()
    {
        $blog = Blog::firstOrNew(['user_id' => $this->user->id]);

        return view('front.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request)
    {
        $blog = Blog::where('user_id', $this->user->id)->first();

        $request->performUpdate($blog);

        return redirect()->route('user.blogs.edit');
    }
}
