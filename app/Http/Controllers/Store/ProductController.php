<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
class ProductController extends BaseController
{
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        return view('store.products.show', compact('product'));
    }
}
