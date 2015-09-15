<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/5/15
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\ArticleCategory;
use App\Http\Requests\PostArticleCategoryRequest;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class ArticleCategoryController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('dashboard.article_category.index');
    }

    public function create(Request $request)
    {
        $data = $request->only('parent_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.article_category.create',compact('data','categories'));
    }

    public function store(PostArticleCategoryRequest $request)
    {
        $input = $request->all();

        ArticleCategory::create($input);

        return redirect()->route('dashboard.article_category.index');
    }

    public function edit($id)
    {
        $data = ArticleCategory::find($id);

        $categories = $this->getCategoryOptions($data);

        return view('dashboard.article_category.edit',compact('data','categories'));
    }

    public function update(PostArticleCategoryRequest $request, $id)
    {
        $articleCategory = ArticleCategory::find($id);

        $articleCategory->update($request->all());

        return recdirect()->route('dashboard.article_category.index');

    }

    public function destroy($id)
    {
        $articleCategory=ArticleCategory::find($id);

        $articleCategory->delete();

        return redirect()->route('dashboard.article_category.index');

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
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->name;
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
        $query = ArticleCategory::select('id', 'name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

} 