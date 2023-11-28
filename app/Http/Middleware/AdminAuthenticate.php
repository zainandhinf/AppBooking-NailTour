<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Memeriksa apakah pengguna yang mencoba mengakses rute adalah admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, Anda dapat mengarahkannya ke halaman lain atau memberikan respons sesuai kebijakan Anda
        return redirect('/login'); // Ganti dengan URL atau tindakan lain yang sesuai dengan kebijakan Anda.
    }
}