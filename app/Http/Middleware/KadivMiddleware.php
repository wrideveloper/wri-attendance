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
        $id = $request->route('id');
        if (auth()->user()->roles_id !== 2) {
            abort(403);
            return redirect('/user');
        } else if ($id !== auth()->user()->id) {
            abort(403);
        }
        return $next($request);
    }
}