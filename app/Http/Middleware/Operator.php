<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset($request->user()->is_operator) && $request->user()->is_operator) {
            return $next($request);
        }
        // $next(new Request(config('constants.HOME_PAGE_URL'), 'GET'));
    }
}
