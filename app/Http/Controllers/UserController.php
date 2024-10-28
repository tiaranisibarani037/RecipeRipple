<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get(); // Mengambil semua data pengguna
        return view('admin.userPage', compact('users')); // Mengirimkan data ke view dengan 'compact'
    }
}
