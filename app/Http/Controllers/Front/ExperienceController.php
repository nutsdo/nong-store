<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/14
 * Time: 下午11:31
 */

namespace App\Http\Controllers\Front;


class ExperienceController extends BaseController
{
    public function index()
    {
        return view('front.experience.index');
    }
}