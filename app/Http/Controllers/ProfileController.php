<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Model untuk user (pastikan sudah dibuat)

class ProfileController extends Controller
{
    // Method untuk menampilkan halaman profil yang telah di-update
    public function showProfile()
    {
        // Dapatkan data user yang sedang login
        $user = auth()->user();
        
        // Tampilkan halaman profil dengan data user
        return view('profile', ['user' => $user]);
    }

    // Method untuk mengedit profil
    public function editProfile()
    {
        // Dapatkan data user yang sedang login
        $user = auth()->user();
        
        // Tampilkan halaman edit profil dengan data user
        return view('edit-profile', ['user' => $user]);
    }

    // Method untuk menyimpan perubahan profil
    public function updateProfile(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required|string|max:15',
            'about' => 'nullable|string|max:500',
        ]);

        // Update profil user yang sedang login
        $user = auth()->user();
        $user->update($validatedData);

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    }
}
