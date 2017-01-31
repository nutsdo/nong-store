<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/24
 * Time: 下午10:55
 */

namespace App\Http\Api\App\Controllers;


class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('jwt.auth',['except' => ['register']]);
    }

    public function register()
    {
        return '注册接口';
    }
}