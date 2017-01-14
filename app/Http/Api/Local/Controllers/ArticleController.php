<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/25
 * Time: 下午9:11
 */

namespace App\Http\Api\Local\Controllers;


use App\Http\Requests\PostArticleRequest;
use App\Models\Article;
use App\Models\Collection;
use App\Models\Comment;
use App\Models\Like;
use App\Transformers\ArticleTransformer;
use Dingo\Api\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ArticleController extends BaseController
{

    public function index(Request $request)
    {
        $articles = Article::paginate(10);
        return $this->response->paginator($articles, new ArticleTransformer);
    }

    public function getArticlesByCategoryId(Request $request, $id)
    {
        $articles = Article::where('category_id', $id)->paginate(10);
        return $this->response->paginator($articles, new ArticleTransformer);
    }

    public function show(Request $request, $id)
    {
        return '';
    }

    /*
     * 保存文章接口
     * */
    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();
        //Article::where()->
        $rule   = [
            'category_id'=>'required|numeric|exists:feature_article_category,id',
            'title'      =>'required',
            'thumb_url'  =>'required',
            'body'       =>'required',
        ];
        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return [
                'status_code'   => 202,
                'message'       => $validator->messages()
            ];
        }
        $data = $request->only('category_id','title','thumb_url','body','status');
        $data['author_id']   = $user->id;
        $data['author_type'] = 'user';
        $create = Article::create();

        if($create){
            $result = [
                'status_code'   => 200,
                'data'          => ['id'=>$create->id],
                'message'       => '保存成功'
            ];
        }else{
            $result = [
                'status_code'    => 201,
                'message'       => '保存失败'
            ];
        }

        return response()->json($result);
    }

    /*
     * 更新文章接口
     * */
    public function update(Request $request, $id)
    {

        $rule   = [
            'category_id'=>'required|numeric|exists:feature_article_category,id',
            'title'      =>'required',
            'thumb_url'  =>'required',
            'body'       =>'required',
        ];
        $validator = Validator::make($request->all(), $rule);

        if ($validator->fails()) {
            return [
                'status_code'   => 202,
                'message'       => $validator->messages()
            ];
        }
        $article = Article::find($id);

        $update = $article->update($request->only('category_id','title','thumb_url','body','status'));

        if($update){
            $result = [
                'status_code'    => 200,
                'data'           => ['id'=>$id],
                'message'        => '更新成功'
            ];
        }else{
            $result = [
                'status_code'    => 201,
                'message'       => '更新失败'
            ];
        }

        return response()->json($result);
    }

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
        $user = Auth::guard('web')->user();
        $article_id = $request->input('article_id');
        $query = Collection::where('user_id',$user->id)
            ->where('collection_type','article')->where('collection_id',$article_id);

        if($query->first()){
            $query->delete();
            Article::find($article_id)->decrement('collections',1);
            $result = [
                'status'    => 200,
                'type'      => 'cancel',
                'msg'       => '已取消收藏'
            ];
        }else{
            Collection::create([
                'user_id'         => $user->id,
                'collection_type' => 'article',
                'collection_id'   => $article_id
            ]);
            Article::find($article_id)->increment('collections',1);
            $result = [
                'status'    => 200,
                'type'      => 'success',
                'msg'       => '收藏成功'
            ];
        }

        return response()->json($result);
    }

    public function comment(Request $request)
    {
        $user = Auth::guard('web')->user();
        $article_id = $request->input('article_id');
        $comment_body = $request->input('comment_body');
        $comment = new Comment([
            'comment_body' => $comment_body,
            'app_user_id' => $user->id,
        ]);

        $article = Article::find($article_id);

        return $article->comments()->save($comment);
    }
}