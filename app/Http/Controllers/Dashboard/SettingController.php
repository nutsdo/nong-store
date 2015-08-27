<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/27/15
 * Time: 9:25 PM
 */

namespace App\Http\Controllers\Dashboard;


use App\Settings;
use Illuminate\Http\Request;

class SettingController extends BaseController{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $setting = Settings::first();
        return view('dashboard.setting.index',compact('setting'));
    }

    public function store(Request $input)
    {
        $data = $input->except('_token');
        $query = Settings::find(1)->update($data);
        return redirect()->back();
    }
} 