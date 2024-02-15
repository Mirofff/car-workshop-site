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
        $user = Auth::user();
        $roles = array_map(fn ($role) => UserRole::from($role), $roles);
        if ($user !== null and in_array($user->getRole(), $roles)) {
            return $next($request);
        } else {
            return to_route('403');
        }
    }
}
