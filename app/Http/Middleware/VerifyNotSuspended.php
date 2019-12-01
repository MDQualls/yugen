<?php

namespace App\Http\Middleware;

use Closure;

class VerifyNotSuspended
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
        if(auth()->user()->status->status == 'suspended')  {
            auth()->logout();
            session()->flash('error', 'Your account is currently suspended and may not access member areas.');
            return redirect()->route('login');
        }

        return $next($request);
    }
}
