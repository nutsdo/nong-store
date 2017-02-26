<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/31/15
 * Time: 9:37 AM
 */

namespace App\Http\Controllers\Dashboard;


use App\Models\Category;
use App\Http\Requests\PostProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Kalnoy\Nestedset\Collection;

class ProductController extends BaseController{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $products = Product::paginate(15);
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
        $data = $request->except('_token');
        $data['publisher_id'] = $this->login_user->id;
        $product = Product::create($data);
        return redirect()->route('dashboard.products.index');
    }

    /*
     * 修改产品信息
     * */
    public function edit(Request $request,$id)
    {
        $product = Product::find($id);

        $data = $request->only('category_id');

        $categories = $this->getCategoryOptions();

        return view('dashboard.products.edit',compact('product','data','categories'));
    }

    /*
     * 更新产品信息
     * */

    public function update(PostProductRequest $request,$id)
    {
        $product = Product::find($id);

        $images = $request->input('images')?:[];

        $data = $request->except('_token','file','_method','images');

        $product->fill($data)->save();
        //dd(array_values($arr));
        if(count($images)>0){
            foreach($images as $image){
                $product->images()->firstOrCreate(['image_url'=>$image]);
            }
        }

        return redirect()->route('dashboard.products.edit',$id);
    }

    /*
     * 删除产品
     * */

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return ['status'=>'success','msg'=>'删除成功'];
    }

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
        $query = Category::select('id', 'category_name')->withDepth();

        if ($except)
        {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

} 