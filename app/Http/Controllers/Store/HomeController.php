<?php

namespace App\Http\Controllers\Store;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $products = Product::where('is_show',1)->paginate(20);

        if($request->ajax()){
            $list = view('front.experience.partials.list')->with('list',$products)->render();
            return response()->json([
                'status_code'  =>  200,
                'message'      => '获取成功',
                'next'         => $products->nextPageUrl(),
                'data'         => $list
            ]);
        }

        return view('store.home', compact('products'));
    }
}
