<?php

namespace App\Http\Middleware;

use Closure;

class HasUsername
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (auth()->guard($guard)->check() && !$request->expectsJson()) {
            $user = $request->user();

            if ($user->username === null || $user->username === '') {
                return redirect()->route('frontend.auth.username');
            }
        }

        return $next($request);
    }
}
