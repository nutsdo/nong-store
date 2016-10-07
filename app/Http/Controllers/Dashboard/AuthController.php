<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/dashboard';
    protected $guard = 'admin';
    protected $loginView = 'dashboard.auth.login';
    protected $registerView = 'dashboard.auth.register';

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'getLogout']);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|confirmed|min:6',
        ]);

    }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }

}
