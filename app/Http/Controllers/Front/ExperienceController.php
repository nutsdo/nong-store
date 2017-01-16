<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/14
 * Time: 下午11:31
 */

namespace App\Http\Controllers\Front;


use App\Models\ExperienceArticle;
use Illuminate\Http\Request;

class ExperienceController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth',[
            'except' => ['index']
        ]);
    }

    public function index(Request $request)
    {
        $experiences = ExperienceArticle::status()->paginate(1);
        if($request->ajax()){
            $list = view('front.experience.partials.list')->with('list',$experiences)->render();
            return response()->json([
                'status_code'  =>  200,
                'message'      => '获取成功',
                'next'         => $experiences->nextPageUrl(),
                'data'         => $list
            ]);
        }
        return view('front.experience.index', compact('experiences'));
    }

    public function create()
    {
        return view('front.experience.create');
    }
}