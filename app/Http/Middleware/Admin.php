<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

Class Admin {

    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasRole(1))
        {
            return $next($request);
        }
        
        return redirect()->route('inicio');
    }

}