<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class LoginCheck
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('login');
        }

        return $next($request);
    }
}
