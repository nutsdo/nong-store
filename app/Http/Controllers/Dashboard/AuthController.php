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
        $this->middleware('guest:admin', ['except' => 'logout']);
    }


    protected function validator(array $data)
    {

        return Validator::make($data, [
            'admin_name' => 'required|max:255',
            'admin_email' => 'required|email|max:255|unique:admins',
            'admin_password' => 'required|confirmed|min:6',
        ]);

    }

    protected function create(array $data)
    {
        return Admin::create([
            'admin_name' => $data['name'],
            'admin_email' => $data['email'],
            'admin_password' => bcrypt($data['password']),
        ]);

    }

}
