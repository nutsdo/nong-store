<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/16
 * Time: 下午10:00
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\Product;
use App\Transformers\ProductTransformer;
use Dingo\Api\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends BaseController
{
    public function store(Request $request)
    {
        $id = $request->input('pid')?:1;
        $qty = $request->input('qty')?:1;
        $product = Product::find($id);

        Cart::add($product->id, $product->title ,$qty, $product->sale_price)->associate('App\Models\Product');

        $result = [
            'status_code'  => 1001,
            'message'      => '加入购物车成功',
            'cart'         => [
                'total' => Cart::total(),
                'count' => Cart::count(),
                'content'=> Cart::content(),
            ]
        ];

        return response()->json($result);
    }

    public function show(Product $product)
    {
        return $this->response->item($product, new ProductTransformer());
    }
}