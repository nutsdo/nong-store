<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public $login_user;

    public function __construct()
    {
        $this->login_user = Auth::guard('web')->user();
    }
}
