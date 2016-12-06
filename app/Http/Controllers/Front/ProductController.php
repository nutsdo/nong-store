<?php

namespace App\Http\Controllers\Front;

use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $products = Products::all();
        //dd($products);
        return view('front.products.index',compact('products'));
        //return '产品首页';
    }

    /*
     * 产品详情页
     * */

    public function getShow($product_id)
    {
        $product = Products::findOrNew($product_id);
        return view('front.products.show',compact('product'));
    }
}
