<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Mengambil data user yang terdaftar per bulan pada tahun berjalan, hanya untuk role "user"
        $userRegistrations = User::where('role', 'user') // filter berdasarkan role
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y')) // filter berdasarkan tahun berjalan
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Menyiapkan data untuk setiap bulan
        $userData = [];
        for ($month = 1; $month <= 12; $month++) {
            $userData[] = $userRegistrations->get($month, 0); // Jika tidak ada data, isi dengan 0
        }

        // Ambil data jumlah resep dari database
        $recipeCounts = Recipe::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Buat array dengan 12 bulan dan isi dengan data dari database
        $recipeData = array_fill(1, 12, 0);
        foreach ($recipeCounts as $month => $count) {
            $recipeData[$month] = $count;
        }

        // Mengirim data ke view
        return view('Admin/adminPage', [
            'userData' => $userData,
            'recipeData' => $recipeData
        ]);
    }
}
