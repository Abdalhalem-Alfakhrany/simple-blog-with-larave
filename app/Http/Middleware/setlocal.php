<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class setlocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $sigment1 = request()->segment(1);

        if (in_array($sigment1, ['ar', 'en'])) {
            app()->setlocale($sigment1);
        }

        return $next($request);
    }
}
