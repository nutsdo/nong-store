<?php

namespace App\Http\Controllers\Store;

use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::where('is_show',1)->paginate(20);

        if($request->ajax()){
            $list = view('front.experience.partials.list')->with('list',$experiences)->render();
            return response()->json([
                'status_code'  =>  200,
                'message'      => '获取成功',
                'next'         => $experiences->nextPageUrl(),
                'data'         => $list
            ]);
        }

        return view('store.home', compact('products'));
    }
}
