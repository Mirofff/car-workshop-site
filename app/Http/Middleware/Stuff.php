<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Stuff
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $stuff = Auth::user();
        $roles = empty($roles) ? ['admin'] : $roles;
        $roles = array_map(fn ($role) => UserRole::from($role), $roles);
        if ($stuff !== null and in_array($stuff->getRole(), $roles)) {
            return $next($request);
        } else {
            return to_route('admin.login');
        }
    }
}
