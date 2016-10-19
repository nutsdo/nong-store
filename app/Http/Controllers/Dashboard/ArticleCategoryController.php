<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/5/15
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Requests\PostArticleCategoryRequest;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kalnoy\Nestedset\Collection;

class ArticleCategoryController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        //ArticleCategory::fixTree();
        //$cate = ArticleCategory::countErrors();
        //dd($cate);
        return view('dashboard.article_category.index');
    }

    public function create(Request $request)
    {
        $data = $request->only('father_id');

        $categories = $this->getCategoryOptions();

        ArticleCategory::fixTree();

        return view('dashboard.article_category.create',compact('data','categories'));
    }

    public function store(PostArticleCategoryRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->login_user->id;
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

        ArticleCategory::fixTree();

        return redirect()->route('dashboard.article_category.index');

    }

    public function destroy($id)
    {
        $articleCategory=ArticleCategory::find($id);

        $articleCategory->delete();

        ArticleCategory::fixTree();

        return redirect()->route('dashboard.article_category.index');

    }

    /**
     * @param Collection $items
     *
     * @return static
     */
    protected function makeOptions(Collection $items)
    {
        //dd($items);
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