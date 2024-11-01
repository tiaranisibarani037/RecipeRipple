<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function postlogin(Request $request)
    {
        // Coba autentikasi berdasarkan email, password, dan "remember"
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Cek apakah checkbox diaktifkan

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user(); // Ambil data pengguna yang sedang login

            // Cek role pengguna dan arahkan sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin'); // Arahkan ke halaman admin
            } else {
                return redirect('/beranda'); // Arahkan ke halaman user biasa
            }
        }

        // Jika autentikasi gagal, kembalikan ke halaman login dengan pesan error
        return redirect('/login')->withErrors('Email atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Hapus session
        $request->session()->regenerateToken(); // Regenerasi token untuk keamanan
        return redirect('/login');
    }
}
