<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user sudah login DAN apakah rolenya sesuai
        if (auth()->check() && auth()->user()->role == $role) {
            return $next($request); // Boleh lewat
        }

        // Jika tidak sesuai, usir ke halaman dashboard atau home
        return redirect('/dashboard')->with('error', 'Kamu tidak punya akses ke halaman tersebut.');
    }
}
