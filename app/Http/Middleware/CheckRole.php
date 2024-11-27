<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request); // Jika role sesuai, lanjutkan request
        }

        return redirect('/home'); // Redirect ke halaman lain jika role tidak sesuai
    }
}
