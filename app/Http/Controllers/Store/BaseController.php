<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/19
 * Time: 下午3:22
 */

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $template;

    public function __construct()
    {
        $this->template = config('template.name').'.';
    }
//
//    public function view($view = null, $data = [], $mergeData = [])
//    {
//        return view($this->template.$view, $data, $mergeData);
//    }
}