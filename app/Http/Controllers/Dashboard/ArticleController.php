<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/5/15
 * Time: 4:01 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests\PostArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class ArticleController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $articles = Article::with('category')->paginate(15);
        return view('dashboard.article.index',compact('articles'));
    }

    public function create(Request $request)
    {
        $data = $request->only('article_category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.article.create', compact('data','categories'));
    }

    public function store(PostArticleRequest $input)
    {
        Article::create($input->all());

        return redirect()->route('dashboard.articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        $categories = $this->getCategoryOptions();

        return view('dashboard.article.edit',compact('article','categories'));

    }

    public function update(PostArticleRequest $request, $id)
    {
        $article = Article::find($id);

        $article->update($request->all());

        return redirect()->route('dashboard.articles.edit',$id);
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        return redirect()->route('dashboard.articles.index');
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
        $query = ArticleCategory::select('id', 'category_name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

} 