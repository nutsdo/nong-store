<?php

namespace App\Http\Api\Local\Controllers;

use App\Http\Requests;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
     * @api {post} /login 登录(login)
     * @apiDescription 登录(login)
     * @apiGroup Auth
     * @apiPermission none
     * @apiParam {Email} email     邮箱
     * @apiParam {String} password  密码
     * @apiVersion local
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *
     *     }
     * @apiErrorExample {json} Error-Response:
     *     HTTP/1.1 400 Bad Request
     *     {
     *         "email": [
     *             "该邮箱已被他人注册"
     *         ],
     *     }
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     =>'required|email',
            'password'  =>'required',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator->messages());
        }

        $credentials = $request->only('email', 'password');

        // 验证失败返回403
        if (! $token = Auth::guard('web')->attempt($credentials)) {
            $this->response->errorForbidden('验证失败');
        }

        $user = Auth::guard('web')->user();

        return $this->response->array(compact('user'));

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'name'         => 'required|min:6|max:255|unique:app_users',
            'email'        => 'required|email|unique:app_users',
            'password'     => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()){
            return $this->errorBadRequest($validator->messages());
        }

        $email = $request->input('email');
        $password = bcrypt($request->input('email'));

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $user = User::create($data);

        return $this->response->array(compact('user'));
    }
}
