<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/7
 * Time: 下午5:20
 */

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\CommunityArticle;
use App\Models\CommunityCategory;
use Illuminate\Http\Request;

class CommunityCategoryController extends Controller
{
    public function index(Request $request, $id)
    {
        if($id)
        {
            $category = CommunityCategory::where('is_banned',0)->find($id);

            $articles = CommunityArticle::where('bbs_category_id',$id)->orderBy('created_time','DESC')->paginate(15);

            if($request->ajax()){
                $list = view('front.posts.partials.list')->with('list',$articles)->render();
                return response()->json([
                    'status_code'  =>  200,
                    'message'      => '获取成功',
                    'next'         => $articles->nextPageUrl(),
                    'data'         => $list
                ]);
            }

            return view('front.community-category.index',compact('category','articles'));
        }
        return redirect()->route('home');
    }
}