<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('berandaPage'); // Pastikan ada view untuk halaman dashboard user
    }
}
