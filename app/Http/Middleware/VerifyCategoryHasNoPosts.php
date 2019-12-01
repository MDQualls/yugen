<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyCategoryHasNoPosts
{
    /**
     * Handle an incoming request.
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $category = $request->route('category');

        if($category->posts->count() > 0)  {
            session()->flash('error', 'You cannot delete a category that has posts associated with it.');
            return redirect(route('category.index'));
        }

        return $next($request);
    }
}

