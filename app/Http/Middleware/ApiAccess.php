<?php

namespace App\Http\Middleware;

use Closure;

class ApiAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = auth()->guard('api');

        if ($auth->check()) {
            return $next($request);
        };

        abort(401, "You're not authorized to access this public REST API.");
    }
}
