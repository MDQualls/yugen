<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomCkFinderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        config(['ckfinder.authentication' => function() {
            return true;
        }]);
        return $next($request);
    }
}
