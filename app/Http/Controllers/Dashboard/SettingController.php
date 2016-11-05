<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 9:25 PM
 */

namespace App\Http\Controllers\Dashboard;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $settings = Settings::paginate(15);
        return view('dashboard.setting.index',compact('settings'));
    }

    public function create()
    {
        return view('dashboard.setting.create');
    }

    public function store(Request $input)
    {
        $this->validate($input,[
            'name'           => 'required|alpha|unique:settings,name',
        ]);
        $data = $input->except('_token','_method');
        $query = Settings::create($data);
        if($query){
            flash()->success('操作成功');
            return redirect()->route('dashboard.setting.index');
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $setting = Settings::find($id);
        return view('dashboard.setting.edit',compact('setting'));
    }

    public function update(Request $input,$id)
    {
        $this->validate($input,[
            'name'           => 'required|alpha|unique:settings,name,'.$id,
        ]);
        $data = $input->except('_token','_method');
        $query = Settings::find($id)->update($data);
        if($query){
            flash()->success('操作成功');
            return redirect()->route('dashboard.setting.edit',$id);
        }else{
            flash()->error('操作失败');
        }

        return redirect()->back();
    }


    public function destroy($id)
    {
        $admin = Settings::find($id);

        $query = $admin->delete();
        if($query){
            flash()->success('操作成功');
        }else{
            flash()->error('操作失败');
        }
        return redirect()->route('dashboard.setting.index');
    }
} 