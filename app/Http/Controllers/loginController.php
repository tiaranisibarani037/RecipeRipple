<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // Fungsi untuk menangani login dengan email dan password
    public function postlogin(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login menggunakan kredensial
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Ambil data pengguna yang sedang login

            // Cek role pengguna dan arahkan sesuai role
            if ($user->role === 'admin') {
                return redirect('/admin'); // Arahkan ke halaman admin
            } else {
                return redirect('/beranda'); // Arahkan ke halaman user biasa
            }
        }

        // Jika login gagal, kembalikan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Fungsi untuk mengarahkan pengguna ke Google untuk login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Fungsi untuk menangani callback dari Google setelah login
    public function handleGoogleCallback()
    {
        // Mendapatkan data pengguna dari Google
        $googleUser = Socialite::driver('google')->user();

        // Mengecek apakah pengguna sudah terdaftar berdasarkan Google ID
        $registeredUser = User::where('google_id', $googleUser->getId())->first();

        if ($registeredUser) {
            // Jika pengguna sudah terdaftar, login
            auth()->login($registeredUser);

            // Arahkan pengguna ke halaman sesuai role
            if ($registeredUser->role === 'admin') {
                return redirect('/admin'); // Arahkan ke halaman admin
            } else {
                return redirect('/beranda'); // Arahkan ke halaman user biasa
            }
        }

        // Jika pengguna belum terdaftar, simpan data pengguna Google di session dan arahkan ke halaman registrasi
        session(['google_user' => $googleUser]);

        return redirect()->route('register'); // Arahkan ke halaman registrasi
    }

    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna
        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/login'); // Redirect ke halaman login setelah logout
    }
}
