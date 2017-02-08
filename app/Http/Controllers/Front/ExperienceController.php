<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/14
 * Time: 下午11:31
 */

namespace App\Http\Controllers\Front;


use App\Http\Requests\StoreExperiencePostRequest;
use App\Models\ExperienceArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function store(StoreExperiencePostRequest $request)
    {
        $inputs = $request->except('_method','_token');

        $inputs['user_id'] = $this->login_user->id;

        $article = ExperienceArticle::create($inputs);

        if($article){
            $result = [
                'status_code'   => 200,
                'message'       => '发布成功',
                'data'          => $article
            ];
        }else{
            $result = [
                'status_code'   => 201,
                'message'       => '发布失败',
            ];
        }

        return response()->json($result);

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }
}