<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function postlogin(Request $request)
    {
        // Coba autentikasi berdasarkan email dan password
        if (Auth::attempt($request->only('email', 'password'))) {
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
        return redirect('/login');
    }
}
