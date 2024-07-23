<?php

namespace App\Http\Middleware;

use App\Helpers\Constants;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class apiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $users = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    "status"    => Constants::STATUS_ERROR,
                    'menssage'  => Constants::ERROR_TOKEN
                ], 401);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([
                    "status"    => Constants::STATUS_ERROR,
                    'menssage'  => Constants::ERORR_TOKEN_EXPIRED
                ], 400);
            } else {
                return response()->json([
                    "status"    => Constants::STATUS_ERROR,
                    'menssage'  => Constants::ERROR_TOKEN
                ], 401);
            }
        }
        return $next($request);
    }
}
