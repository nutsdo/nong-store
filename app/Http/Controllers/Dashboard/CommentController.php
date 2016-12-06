<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $comments = Comment::paginate(20);
        //dd($comments);
        return view('dashboard.comments.index',compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        return view('dashboard.comments.show',compact('comment'));
    }

    public function destroy($id)
    {
        $article = Comment::find($id);

        $article->delete();

        return redirect()->route(['dashboard.articles.comments',$id]);
    }

}
