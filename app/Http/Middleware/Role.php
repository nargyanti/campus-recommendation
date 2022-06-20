<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Role
{
    public function handle($request, Closure $next, $role) {
        if(Auth::user()->role == $role){            
            return $next($request);
        }
        return redirect('/');  
    }
}
