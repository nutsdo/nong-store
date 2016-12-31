<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2016/12/31
 * Time: 上午10:49
 */

namespace App\Http\Api\Local\Controllers;


use App\Models\ArticleCategory;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
use Dingo\Api\Http\Request;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $categories = ArticleCategory::where('is_banned',0)->get();
        return $categories->toTree();
        return $this->response->collection($categories, new CategoryTransformer);
    }
}