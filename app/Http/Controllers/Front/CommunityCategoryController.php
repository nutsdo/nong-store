<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午5:20
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\CommunityCategory;

class CommunityCategoryController extends Controller
{
    public function index($id)
    {
        $category = CommunityCategory::findOrFail($id);
        return view('front.community-category.index',compact('category'));
    }
}