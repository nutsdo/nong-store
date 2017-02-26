<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/26
 * Time: 下午11:17
 */

namespace App\Http\ViewComposers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\View\View;

class StoreCommonComposer
{
    /**
     * 将数据绑定到视图。
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //查询购物车
        $cart = Cart::content();
        $total = Cart::total();
        $count = Cart::count();

        $shoppingCart = [
            'content'   => $cart,
            'total'     => $total,
            'count'     => $count,
        ];

        $view->with('shoppingCart', $shoppingCart);

    }
}