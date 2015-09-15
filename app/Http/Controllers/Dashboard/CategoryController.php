<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/28/15
 * Time: 9:45 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Category;
use App\Http\Requests\PostCategoryRequest;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class CategoryController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        return view('dashboard.category.index');
    }

    public function create(Request $request)
    {
        $data = $request->only('parent_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.category.create',compact('data','categories'));
    }

    public function store(PostCategoryRequest $input)
    {
        $category = Category::create($input->all());

        return redirect()
            ->route('dashboard.category.index');
    }

    public function edit($id)
    {
        $data = Category::find($id);

        $categories = $this->getCategoryOptions($data);

        return view('dashboard.category.create',compact('data','categories'));
    }

    public function update(PostCategoryRequest $input, $id)
    {
        $category = Category::find($id);

        $category->update($input->all());

        return redicrect()->route('dashboard.category.index');
    }

    public function show($id)
    {
        return ;
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
            $options[$item->getKey()] = str_repeat('‒', $item->depth + 1).' '.$item->title;
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
        $query = Category::select('id', 'title')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }
} 