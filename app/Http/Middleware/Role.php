<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $roles = array_map(fn (string $role) => UserRole::from($role), $roles);
        // TODO: wtf - need to rewrite
        if (Auth::user() and in_array(Auth::user()->getRole(), $roles)) {
            return $next($request);
        }
        return to_route('403');
    }
}
