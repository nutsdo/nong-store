<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午10:41
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\CommunityArticle;
use App\Models\CommunityComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityArticleController extends Controller
{
    public function show($id)
    {
        $post = CommunityArticle::find($id);

        return view('front.posts.show', compact('post'));
    }

    public function reply(Request $request)
    {
        $user = Auth::guard('web')->user();
        $post_id = $request->input('post_id');
        $comment_body = $request->input('comment_body');
        $post = CommunityArticle::find($post_id);
        $comment = new CommunityComment([
            "comment_body"  => $comment_body,
            "comment_user_id"  => $user->id,
        ]);

        $post->comments()->save($comment);
        return back();
    }
}