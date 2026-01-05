<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        if ($userRole === 'admin') {
            return $next($request);
        }

        if ($userRole === 'admin1' && in_array('admin1', $roles)) {
            return $next($request);
        }

        if ($userRole === 'user' && in_array('user', $roles)) {
            return $next($request);
        }

        abort(403, 'Anda tidak punya akses ke halaman ini.');
    }
}
