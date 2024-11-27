<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    // Fungsi untuk menampilkan halaman registrasi
    public function index(Request $request)
    {
        // Pastikan data Google ada di session
        $googleUser = $request->session()->get('google_user', null);

        // Cek apakah googleUser ada dan valid
        if ($googleUser) {
            // Jika data Google ada, tampilkan data pengguna
            return view('signup', ['googleUser' => $googleUser]);
        }

        // Jika tidak ada data Google, redirect atau tampilkan form kosong
        return view('signup');
    }

    // Fungsi untuk menyimpan data registrasi pengguna baru
    public function store(Request $request)
    {
        // Validasi data dari form registrasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed', // Pastikan konfirmasi password di form
            'nomor_telepon' => 'required', // Pastikan sesuai dengan nama kolom di database
        ]);

        // Cek apakah data datang dari Google (via session)
        $isGoogleUser = $request->has('google_id'); // Cek jika google_id ada di request

        // Jika pengguna berasal dari login Google, pastikan google_token ada di request
        $googleToken = $isGoogleUser ? $request->google_token : null;

        // Simpan user baru ke dalam database
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Enkripsi password
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'role' => 'user', // Set default role sebagai 'user'
            'google_id' => $isGoogleUser ? $request->google_id : null, // Set google_id jika ada
            'google_token' => $googleToken, // Set google_token jika ada
        ]);

        // Melakukan login setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke halaman beranda
        return redirect('/beranda');
    }
}
