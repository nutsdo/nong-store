<?php

namespace App\Http\Controllers\Store;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShoppingCartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = $this->loginUser;

        $cart = Cart::content();
        $total = Cart::total();
        $count = Cart::count();

        return view('store.cart.index', compact('cart','total','count'));
    }
}
