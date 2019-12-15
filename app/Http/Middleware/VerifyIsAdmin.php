<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyIsAdmin
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
        if(!auth()->user()->isAdmin())  {
            session()->flash('error', 'You must be an administrator to access that area of the application.');
            return redirect(route('dashboard'));
        }
        return $next($request);
    }
}
