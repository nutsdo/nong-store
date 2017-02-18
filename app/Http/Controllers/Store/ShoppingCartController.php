<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use App\Transformers\ProductTransformer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class ShoppingCartController extends Controller
{
    public function store(Request $request)
    {
        dd(Hashids::encode(1)); //$hashid = oRdLWKVP
        $id = $request->input('id')?:1;
        $qry = $request->input('qry')?:1;
        $title = $request->input('title')?:'情趣内衣';
        $price = $request->input('price')?:9.99;
        Cart::add($id,$title,$qry,$price);
        $result = [];
        return response()->json($result);
    }

    public function show(Product $product)
    {
        return response()->collection($product, new ProductTransformer);
    }
}
