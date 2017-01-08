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

        return view('dashboard.comment.index',compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        return view('dashboard.comment.show',compact('comment'));
    }

    public function check($id)
    {
        $comment = Comment::find($id);
        if($comment->is_checked){
            $comment->update([
                'is_checked'    => 0
            ]);
        }else{
            $comment->update([
                'is_checked'    => 1
            ]);
        }

        flash()->success('操作成功');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $article = Comment::destroy($id);

        if($article) {

            flash()->success('删除成功');

        } else {

            flash()->error('删除失败');

        }

        return redirect()->back();

    }

}
