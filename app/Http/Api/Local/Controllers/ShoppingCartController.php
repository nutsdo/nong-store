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

class ShoppingCartController extends BaseController
{
    public function store(Request $request)
    {

    }

    public function show(Product $product)
    {
        return $this->response->item($product, new ProductTransformer());
    }
}