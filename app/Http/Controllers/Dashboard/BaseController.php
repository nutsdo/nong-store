<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 8/25/15
 * Time: 9:52 AM
 */

class BaseController extends Controller{

    public $login_user;

    public function __construct()
    {
        $this->middleware('auth.dashboard:admin');
        $this->login_user = Auth::guard('admin')->user();
    }
} 