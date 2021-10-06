<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!in_array('admin'||'owner', auth()->user()->UserRoles))
        {
            return redirect(route('admin.login'));
        }
        if(!auth()->user()->status)
        {
            return redirect(route('admin.login'));
        }
        return $next($request);
    }
}
