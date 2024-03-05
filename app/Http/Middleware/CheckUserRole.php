<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();

            // Cek apakah pengguna adalah admin dan memiliki email yang sesuai
            if ($user->role === 'admin' && $user->email === 'admin@admin.com' && $user->password === bcrypt('1111111111')) {
                // Cek apakah ini adalah admin pertama yang login
                if (!session()->has('admin_first_login')) {
                    // Jika bukan admin pertama yang login, redirect dengan pesan error
                    return redirect('/')->with('error', 'Hanya satu admin yang diizinkan.');
                }
            } else {
                // Jika bukan admin atau email dan password tidak sesuai, redirect ke halaman home
                return redirect('/');
            }
        } else {
            // Jika pengguna belum login, redirect ke halaman home
            return redirect('/');
        }

        return $next($request);
    }
}
