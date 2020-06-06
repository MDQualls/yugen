<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserIsUser
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
        if(auth()->user()->id != $request->user->id)  {
            auth()->logout();
            return redirect()->route('/');
        }

        return $next($request);
    }
}
