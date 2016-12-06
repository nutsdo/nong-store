<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 9/6/15
 * Time: 9:47 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\ArticleCategory;
use App\Http\Requests\PostPageRequest;
use App\Page;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class PageController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $pages = Page::paginate(15);
        return view('dashboard.page.index',compact('pages'));
    }

    public function create(Request $request)
    {
        $data = $request->only('article_category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.page.create',compact('data','categories'));
    }

    public function store(PostPageRequest $request)
    {
        Page::create($request->all());

        return redirect()->route('dashboard.pages.index');
    }

    public function edit($id)
    {

        $page = Page::find($id);

        $categories = $this->getCategoryOptions();

        return view('dashboard.page.edit',compact('page','categories'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {

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