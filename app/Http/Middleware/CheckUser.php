<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'user') {
            return $next($request);
        }

        return redirect('/');
    }
}
