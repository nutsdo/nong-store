<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 9:37 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\Category;
use App\Http\Requests\PostProductRequest;
use App\Products;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class ProductController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $products = Products::paginate(15);
        return view('dashboard.products.index',compact('products'));
    }

    /*
     * 添加商品
     * */
    public function create(Request $request)
    {
        $data = $request->only('category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.products.create',compact('data','categories'));
    }

    /*
     * 存储商品信息
     * */
    public function store(PostProductRequest $request)
    {
        $product = Products::create($request->except('_token'));
        return redirect()->route('dashboard.products.index');
    }

    /*
     * 修改产品信息
     * */
    public function edit(Request $request,$id)
    {
        $product = Products::find($id);

        $data = $request->only('category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.products.edit',compact('product','data','categories'));
    }

    /*
     * 更新产品信息
     * */

    public function update(PostProductRequest $request,$id)
    {
        $product = Products::find($id);
        $product->update($request->except('_token'));
        return redirect()->route('dashboard.products.edit',$id);
    }

    /*
     * 删除产品
     * */

    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return ['status'=>'success','msg'=>'删除成功'];
    }

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