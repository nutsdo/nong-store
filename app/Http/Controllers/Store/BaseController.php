<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/2/19
 * Time: 下午3:22
 */

namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public $loginUser;

    public function __construct()
    {
        $this->loginUser = Auth::guard('web')->user();
    }

}