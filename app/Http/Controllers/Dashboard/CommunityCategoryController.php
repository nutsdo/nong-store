<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\PostArticleCategoryRequest;
use App\Http\Requests\PostCommunityCategoryRequest;
use App\Models\CommunityCategory;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class CommunityCategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $categories = CommunityCategory::defaultOrder()->get()->toTree();

        return view('dashboard.community_category.index',compact('categories'));
    }

    public function create(Request $request)
    {
        $data = $request->only('father_id');

        $categories = $this->getCategoryOptions();

        CommunityCategory::fixTree();

        return view('dashboard.community_category.create',compact('data','categories'));
    }

    public function store(PostCommunityCategoryRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = $this->login_user->id;
        CommunityCategory::create($input);

        return redirect()->route('dashboard.community-category.index');
    }

    public function edit($id)
    {
        $data = CommunityCategory::find($id);

        $categories = $this->getCategoryOptions($data);

        return view('dashboard.community_category.edit',compact('data','categories'));
    }

    public function update(PostCommunityCategoryRequest $request, $id)
    {
        $articleCategory = CommunityCategory::find($id);

        $articleCategory->update($request->all());

        CommunityCategory::fixTree();

        return redirect()->route('dashboard.community-category.index');

    }

    public function destroy($id)
    {
        $articleCategory=CommunityCategory::find($id);

        $articleCategory->delete();

        CommunityCategory::fixTree();

        return redirect()->route('dashboard.community-category.index');

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
        $query = CommunityCategory::select('id', 'category_name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }
}
