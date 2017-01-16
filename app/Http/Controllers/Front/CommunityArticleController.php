<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午10:41
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Http\Requests\PostCommunityArticleRequest;
use App\Models\CommunityArticle;
use App\Models\CommunityCategory;
use App\Models\CommunityComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kalnoy\Nestedset\Collection;

class CommunityArticleController extends BaseController
{

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth',[
            'except' => ['show']
        ]);

    }

    //发帖页面
    public function create(Request $request)
    {
        $data['bbs_category_id'] = $request->only('c');
        $categories = $this->getCategoryOptions();
        return view('front.posts.create', compact('data','categories'));
    }

    public function edit($id)
    {
        $post = CommunityArticle::where('user_id', $this->login_user->id)
                                    ->where('id',$id)->first();
        $categories = $this->getCategoryOptions();
        return view('front.posts.edit', compact('post','categories'));
    }

    public function store(PostCommunityArticleRequest $request)
    {
        $inputs = $request->only('title', 'body','bbs_category_id');
        array_push($inputs,['user_id'=> $this->login_user->id]);
        $result = CommunityArticle::create($inputs);

        if($result){
            return redirect()->route('posts.show', $result->id);
        }else{
            return back();
        }
    }

    public function update(PostCommunityArticleRequest $request, $id)
    {
        $inputs = $request->only('title', 'body','bbs_category_id');
        $inputs = array_merge($inputs,['user_id'=> $this->login_user->id]);

        $post = CommunityArticle::where('user_id', $this->login_user->id)->where('id',$id)->first();
        $result = $post->update($inputs);
        //dd($result);
        if($result){
            return redirect()->route('posts.show', $id);
        }else{
            return back();
        }
    }

    public function destroy($id)
    {
        CommunityArticle::where('user_id', $this->login_user->id)->where('id',$id)->delete();

        return redirect()->route('ucenter',$this->login_user->id);
    }

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




    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        $options = [ '' => '选择分类' ];

        foreach ($items as $item)
        {
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->category_name;
        }

        return $options;
    }

    /**
     * @param Category $except
     *
     * @return CategoriesController
     */
    protected function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = CommunityCategory::select('id', 'category_name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }
}