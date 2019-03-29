<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class apiAutoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = $request->header('Authorization');

        if (!isset($auth)){
            return response(['uid'], 403);
        }

        if (!isset($request->api_token)){
            return response(['token'], 403);
        }

        $user = User::where('uid', $auth)->where('api_token', $request->api_token)->first();

        if(!isset($user)){
            return response(['register'], 403);
        }

        $request->user = $user;

        return $next($request);
    }
}
