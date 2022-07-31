<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserMiddleware
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
        $Uri =  request()->getRequestUri();

        if (!auth()->user()->roles_id >= 1 && !auth()->user()->roles_id <= 3) {
            abort(403);
            return redirect('/');
        } else if ($Uri !== '/user/'.auth()->user()->nim.'/edit') {
            abort(403);
        }

        return $next($request);
    }
}
