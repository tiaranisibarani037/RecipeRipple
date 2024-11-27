<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    // Menyimpan data resep baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'slug' => 'required|string|unique:recipes,slug',
        ]);

        // Simpan data ke database
        $recipe = Recipe::create($request->all());

        return redirect()->route('recipe.index')->with('success', 'Recipe added successfully!');
    }

    // Menangani pencarian resep
    public function search(Request $request)
    {
        // Ambil input pencarian
        $query = $request->input('query');

        // Cari resep berdasarkan judul atau deskripsi
        $recipes = Recipe::where('title', 'like', "%$query%")
                        ->orWhere('description', 'like', "%$query%")
                        ->get();

        // Kembalikan ke view hasil pencarian
        return view('search-results', compact('recipes', 'query'));
    }
}
