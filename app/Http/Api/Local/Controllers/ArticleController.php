<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 下午9:11
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\Article;
use App\Models\Like;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends BaseController
{
    /*
     * 点赞
     * */
    public function doLike(Request $request)
    {
        $user = Auth::guard('web')->user();
        $article_id = $request->input('article_id');
        $query = Like::where('user_id',$user->id)
            ->where('like_type','article')->where('like_id',$article_id);
        if($query->first()){
            $query->delete();
            Article::find($article_id)->decrement('likes',1);
            $result = [
                'status'    => 200,
                'type'      => 'cancel',
                'msg'       => '已取消点赞'
            ];
        }else{
            Like::create([
                'user_id'   => $user->id,
                'like_type' => 'article',
                'like_id'   => $article_id
            ]);
            Article::find($article_id)->increment('likes',1);
            $result = [
                'status'    => 200,
                'type'      => 'success',
                'msg'       => '点赞成功'
            ];
        }
        return $result;
    }

    public function doCollect(Request $request)
    {

    }
}