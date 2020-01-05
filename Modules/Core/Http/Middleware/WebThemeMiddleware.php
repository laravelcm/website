<?php

namespace Modules\Core\Http\Middleware;

use Closure;

class WebThemeMiddleware
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
        \Theme::set(config('core.theme.frontend'));

        return $next($request);
    }
}
