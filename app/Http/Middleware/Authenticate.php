<?php

namespace Steller\Blog\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

/**
 * Class Authenticate
 *
 * @package Steller\Blog\Http\Middleware
 */
class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  Request $request
     * @param  Closure $next
     * @param  string|null $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}
