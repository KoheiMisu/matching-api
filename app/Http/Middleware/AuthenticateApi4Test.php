<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use JWTAuth;

class AuthenticateApi4Test
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  $guard = null)
    {
        if (env('APP_ENV') === 'testing') {
            JWTAuth::setRequest($request);
        }

        JWTAuth::parseToken();
        $user = JWTAuth::parseToken()->authenticate();

        return $next($request);
    }
}
