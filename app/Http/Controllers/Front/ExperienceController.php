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
use App\Models\Products;
use App\Models\User;
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
//        $products = Products::where('is_show',1)->take(12)->get();

        $experiences = ExperienceArticle::status()->paginate(18);
        if($request->ajax()){
            $list = view('front.experience.partials.list')->with('list',$experiences)->render();
            return response()->json([
                'status_code'  =>  200,
                'message'      => '获取成功',
                'next'         => $experiences->nextPageUrl(),
                'data'         => $list
            ]);
        }

        $experiencers = User::inRandomOrder()->take(10)->get();
        //dd($experiencers);
        return view('front.experience.index', compact('experiences','experiencers'));
    }

    public function create()
    {
        return view('front.experience.create');
    }

    public function store(StoreExperiencePostRequest $request)
    {
        $inputs = $request->only('title','experiencer_product_id','body','thumb_url');

        $inputs['user_id'] = $this->login_user->id;

        $inputs['experiencer_product_id'] = 1;

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

        return back();
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