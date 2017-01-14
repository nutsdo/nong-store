<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/14
 * Time: 下午8:44
 */

namespace App\Http\Controllers\Front;


use App\Models\Article;
use App\Models\CommunityArticle;
use App\Models\User;
use Illuminate\Http\Request;

class UcenterController extends BaseController
{
    public function index($id)
    {
        $user = User::find($id);
        $articles = Article::ofUserId($id)->status()->paginate(15);
        //dd($user->isFollowing(1));
        return view('front.ucenter.index',compact('user','articles'));
    }

    public function article(Request $request,$user_id)
    {
        return $this->index($user_id);
    }

    public function posts(Request $request,$user_id)
    {
        $user = User::find($user_id);

        $posts = CommunityArticle::ofUserId($user_id)->status()->paginate(20);

        return view('front.ucenter.posts',compact('user','posts'));
    }
}