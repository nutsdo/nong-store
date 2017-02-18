<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        return view('store.products.show', compact('product'));
    }
}
