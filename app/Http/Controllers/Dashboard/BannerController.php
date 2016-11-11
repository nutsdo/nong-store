<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Banner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BannerController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $banners = Banner::all();
        return view('dashboard.banner.index',compact('banners'));
    }

    public function create()
    {
        return view('dashboard.banner.create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token','_method');

        $this->validate($request,[
            'title'        => 'required',
            'image_url'    => 'required',
            'route_url'    => 'required',
        ]);
        $banner = Banner::create($input);
        if($banner){
            flash()->success('操作成功');
            return redirect()->route('dashboard.banner.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('dashboard.banner.edit',compact('banner'));
    }

    public function update(Request $request,$id)
    {
        $input = $request->except('_token','_method');

        $this->validate($request,[
            'title'        => 'required',
            'image_url'    => 'required',
            'route_url'    => 'required',
        ]);
        $banner = Banner::find($id);
        $res = $banner->update($input);
        if($res){
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);

        $banner->delete();

        flash()->success('操作成功');

        return redirect()->route('dashboard.banner.index');
    }
}
