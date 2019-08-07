<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class BasicAuth
{
    public function handle($request, Closure $next)
    {
        if(Auth::onceBasic()){
            return response()->json(['message' => 'Auth failed'],401);
        }
        return $next($request);
    }
}
