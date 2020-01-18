<?php

namespace Modules\Core\Http\Middleware;

use Closure;

class AdminThemeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!is_null(config('core.theme.backend'))) {
            \Theme::set(config('core.theme.backend'));
        }

        return $next($request);
    }
}
