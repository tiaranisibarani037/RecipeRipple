<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('profilPage', compact('user')); // Kirim data ke profilPage
    }

    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('editProfilePage', compact('user')); // Kirim data ke editProfilePage
    }

    public function update(Request $request)
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nomor_telepon' => 'required|string|max:15',
        ]);

        // Update data pengguna
        $update = DB::table('users')->where('id', $user->id)->update([
            'name' => $request->input('name'),       // Mengupdate kolom 'name' dengan input dari request
            'email' => $request->input('email'),     // Mengupdate kolom 'email' dengan input dari request
            'nomor_telepon' => $request->input('nomor_telepon'),     // Mengupdate kolom 'phone' dengan input dari request
        ]);

        // Cek apakah update berhasil
        if ($update) {
            // Redirect ke halaman profil dengan pesan sukses
            return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
        } else {
            // Redirect ke halaman edit profil dengan pesan error
            return redirect()->route('profile.edit')->with('error', 'Failed to update profile.');
        }
    }
}