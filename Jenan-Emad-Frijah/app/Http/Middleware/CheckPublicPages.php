<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPublicPages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next)
{
    if (auth()->check()) {

        if (auth()->user()->role === 'tutor') {
            return redirect()->route('tutor.my_requests');
        }

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    return $next($request);
}

}
