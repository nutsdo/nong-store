<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\PostCommunityArticleRequest;
use App\Models\CommunityArticle;
use App\Models\CommunityCategory;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class CommunityArticlesController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $articles = CommunityArticle::with('category')->paginate(15);
        return view('dashboard.community_article.index',compact('articles'));
    }

    public function create(Request $request)
    {
        $data = $request->only('category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.community_article.create', compact('data','categories'));
    }

    public function store(PostCommunityArticleRequest $input)
    {
        CommunityArticle::create($input->all());

        return redirect()->route('dashboard.community-article.index');
    }

    public function edit($id)
    {
        $article = CommunityArticle::find($id);

        $categories = $this->getCategoryOptions();

        return view('dashboard.community_article.edit',compact('article','categories'));

    }

    public function update(PostCommunityArticleRequest $request, $id)
    {
        $article = CommunityArticle::find($id);

        $article->update($request->all());

        return redirect()->route('dashboard.community-article.edit',$id);
    }

    public function destroy($id)
    {
        $article = CommunityArticle::find($id);

        $article->delete();

        return redirect()->route('dashboard.community-article.index');
    }


    public function comments($article_id)
    {
        $article = CommunityArticle::with('comments')->find($article_id);
        return view('dashboard.article.comments',compact('article'));
    }

    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        $options = [ '' => '顶级分类' ];

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
