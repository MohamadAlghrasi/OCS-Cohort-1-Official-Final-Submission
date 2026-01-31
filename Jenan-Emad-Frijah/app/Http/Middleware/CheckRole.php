<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $role = auth()->user()->role;

        if (!in_array($role, $roles)) {

            if ($role === 'tutor') {
                return redirect()->route('tutor.my_requests');
            }

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($role === 'student') {
                return redirect()->route('home.index');
            }

            abort(403);
        }

        return $next($request);
    }
}
