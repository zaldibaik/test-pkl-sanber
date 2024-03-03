<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Cek apakah pengguna sudah ada di database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Jika pengguna sudah ada, autentikasi pengguna
            Auth::login($existingUser);
        } else {
            // Jika pengguna belum ada, daftarkan pengguna baru
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->save();

            // Autentikasi pengguna baru
            Auth::login($newUser);
        }

        // Redirect ke halaman dashboard atau halaman yang diinginkan setelah login
        return redirect('/dashboard');
    }
}
