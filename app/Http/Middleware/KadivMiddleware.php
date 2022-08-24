<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KadivMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->expectsJson()) {
            if (auth()->user()->roles_id !== 2) {
                abort(401);
                return redirect()->back()->with('AccessError', 'You are not authorized to access this page');
            }
            return redirect()->back()->with('AccessError', 'You are not authorized to access this page');
        }
        return $next($request);
    }
}
