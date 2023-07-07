<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('home');
        }

        if(Auth::user()->role != "admin"){
            return redirect('home');
        }
 
        return $next($request);
    }
}
