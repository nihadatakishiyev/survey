<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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
        $user = User::where('api_token', $request->query('api_token'))->first();

        if($user){
            Auth::login($user);
            return $next($request);
        }else{
            return response()->json(['message' => 'not auth'],401 );
        }
    }
}
