<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
class ProductController extends BaseController
{
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = collect([
            'data'  => Cart::content(),
            'total'  => Cart::total(),
            'count'  => Cart::count(),
        ]);
        //dd($cart);
        //dd(Cart::content()['370d08585360f5c568b18d1f2e4ca1df']->model);
        return view('store.products.show', compact('product', 'cart'));
    }
}
