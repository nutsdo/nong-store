<?php
/**
 * Created by PhpStorm.
 * User: lvdingtao
 * Date: 2017/1/23
 * Time: 下午10:31
 */

namespace App\Http\Api\App\Controllers;


use Carbon\Carbon;
use Dingo\Api\Contract\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @Resource("OAuth")
 */
class OAuthController extends BaseController
{
    /**
     * Register user
     *
     * Register a new user with a `username` and `password`.
     *
     * @Post("/")
     * @Versions({"app"})
     * @Request({"username": "foo", "password": "bar"}, identifier="A")
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $result = [
            'token'             => $token,
            'expired_at'        => Carbon::now()->addMinute(config('jwt.ttl'))->toDateTimeString(),
            'refresh_expired_at'=> Carbon::now()->addMinute(config('jwt.refresh_ttl'))->toDateTimeString(),

        ];
        // all good so return the token
        return $this->response->array($result)->setStatusCode(200);
    }

    /*
     * refresh token
     * */
    public function refresh()
    {
        $token = JWTAuth::getToken();
        $new_token = JWTAuth::refresh($token);

        $result = [
            'token'             => $new_token,
            'expired_at'        => Carbon::now()->addMinute(config('jwt.ttl'))->toDateTimeString(),
            'refresh_expired_at'=> Carbon::now()->addMinute(config('jwt.refresh_ttl'))->toDateTimeString(),

        ];
        return $this->response->array($result);
    }

}