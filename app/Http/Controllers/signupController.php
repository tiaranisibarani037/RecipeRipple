<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class signupController extends Controller
{
    public function index(Request $request){
        return view('signup');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'nomor_telepon' => 'required|numeric' // pastikan sesuai dengan nama kolom di database
        ]);

        // Tambahkan 'role' sebagai default 'user' dan simpan password yang terenkripsi
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Enkripsi password
            'nomor_telepon' => $validatedData['nomor_telepon'],
            'role' => 'user' // Set default role sebagai 'user'
        ]);

        return redirect('/login');
    }
}
