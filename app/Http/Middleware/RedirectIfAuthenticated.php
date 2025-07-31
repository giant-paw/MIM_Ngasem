<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // INI LOGIKA PENTINGNYA
                // Jika user yang sudah login adalah admin, arahkan ke dashboard admin
                if (Auth::user()->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                // Jika ada role lain (misal: 'user' biasa), bisa diarahkan ke tempat lain
                // atau biarkan default ke halaman utama
                return redirect('/');
            }
        }

        return $next($request);
    }
}