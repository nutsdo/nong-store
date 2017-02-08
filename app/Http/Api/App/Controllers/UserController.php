<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/24
 * Time: 下午10:55
 */

namespace App\Http\Api\App\Controllers;


use App\Models\User;
use Dingo\Api\Http\Request;
use Illuminate\Validation\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('jwt.auth',['except' => ['register']]);
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
        $password = bcrypt($request->input('password'));

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        $user = User::create($data);

        $result = [
            'user'  => $user,
            'status_code'   => 200
        ];
        return $this->response->array($result);
    }

    public function me()
    {
        $user = $this->getAuthenticatedUser();

        return $user;
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json([
            'user'       => $user,
            'status_code'=> 200,
        ]);
    }
}