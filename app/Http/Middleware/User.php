<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(Auth::user()->is_operator) and isset(Auth::user()->is_admin) and (!Auth::user()->is_admin and !Auth::user()->is_operator)) {
            return $next($request);
        }
        return response()->view('errors.403', ['title' => 'Forbidden']);
    }
}
