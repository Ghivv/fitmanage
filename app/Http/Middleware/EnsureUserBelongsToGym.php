<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBelongsToGym
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(401);
        }

        if (Auth::user()->role === 'super_admin') {
            return $next($request);
        }

        if (!Auth::user()->gym_id) {
            abort(403, 'You are not associated with any gym.');
        }

        return $next($request);
    }
}
