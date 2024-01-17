<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah pengguna memiliki peran yang diizinkan
        if (!$request->user() || !$request->user()->role === $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
