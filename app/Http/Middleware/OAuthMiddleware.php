<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->user()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status_code'   => 201,
                    'message'       => '未登录!',
                ]);
            }
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }
}
