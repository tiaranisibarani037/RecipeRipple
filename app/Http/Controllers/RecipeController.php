<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->paginate(10);
        return view('recipe.index', compact('recipes'));
    }

    public function create()
    {
        $kategori = Kategori::all();  // Get all categories
        return view('recipe.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'kategori_id' => 'required',
            'bahan' => 'required|array',
            'langkah' => 'required|array',
            'langkah_image' => 'required',
        ]);

        // Handle file uploads for langkah images
        $langkah_images = [];

        if ($request->hasFile('langkah_image')) {
            foreach ($request->file('langkah_image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/recipe/image'), $filename);
                $langkah_images[] = $filename;
            }
        }

        // Handle file upload for video
        $filename = null;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/recipe/video'), $filename);
        }

        // Handle file upload for gambar
        $gambar_filename = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambar_filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/recipe/gambar'), $gambar_filename);
        }

        // Store the recipe data, using implode() for 'bahan' and 'langkah'
        $recipe = Recipe::create([
            'video_path' => $filename,
            'name' => $request->name,
            'gambar' => $gambar_filename,
            'description' => $request->description,
            'kategori_id' => $request->kategori_id,
            'bahan' => implode(', ', $request->bahan),  // Store as a comma-separated string
            'langkah' => implode(', ', $request->langkah),  // Store as a comma-separated string
            'langkah_image' => json_encode($langkah_images),
        ]);

        if ($recipe) {
            return redirect()->route('recipe.index')->with('success', 'Recipe add successfully.');
        }

        return redirect()->route('recipe.index')->with('success', 'Recipe add successfully.');
    }

    //show
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe.show', compact('recipe'));
    }

    //destroy
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return redirect()->route('recipe.index')->with('success', 'Recipe deleted successfully.');
    }

    //edit
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $kategori = Kategori::all();

        $data = [
            'recipe' => $recipe,
            'kategori' => $kategori
        ];

        return view('recipe.edit', compact('data'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'video' => 'nullable|mimes:mp4,avi,mov|max:50000',
            'bahan' => 'required|array',
            'bahan.*' => 'string',
            'langkah' => 'required|array',
            'langkah.*' => 'string',
            'langkah_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $recipe = Recipe::findOrFail($id);

        // Update langkah images
        $langkah_images = json_decode($recipe->langkah_image, true) ?? [];

        if ($request->hasFile('langkah_image')) {
            foreach ($request->file('langkah_image') as $index => $file) {
                if (isset($langkah_images[$index])) {
                    // Hapus file lama
                    $oldPath = public_path('uploads/recipe/image/' . $langkah_images[$index]);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/recipe/image'), $filename);
                $langkah_images[$index] = $filename;
            }
        }

        // Update gambar
        if ($request->hasFile('gambar')) {
            if ($recipe->gambar) {
                $oldGambarPath = public_path('uploads/recipe/gambar/' . $recipe->gambar);
                if (file_exists($oldGambarPath)) {
                    unlink($oldGambarPath);
                }
            }
            $gambar_filename = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('uploads/recipe/gambar'), $gambar_filename);
            $recipe->gambar = $gambar_filename;
        }

        // Update video
        if ($request->hasFile('video')) {
            if ($recipe->video_path) {
                $oldVideoPath = public_path('uploads/recipe/video/' . $recipe->video_path);
                if (file_exists($oldVideoPath)) {
                    unlink($oldVideoPath);
                }
            }
            $video_filename = time() . '.' . $request->file('video')->getClientOriginalExtension();
            $request->file('video')->move(public_path('uploads/recipe/video'), $video_filename);
            $recipe->video_path = $video_filename;
        }

        // Update other fields
        $recipe->update([
            'name' => $request->name,
            'description' => $request->description,
            'kategori_id' => $request->kategori_id,
            'bahan' => implode(', ', $request->bahan),
            'langkah' => implode(', ', $request->langkah),
            'langkah_image' => json_encode($langkah_images),
        ]);

        return redirect()->route('recipe.index')->with('success', 'Resep berhasil diperbarui.');
    }

    // $recipe = Recipe::findOrFail($id);

    // // Update data utama resep
    // $recipe->name = $validatedData['name'];
    // $recipe->description = $validatedData['description'];
    // $recipe->kategori_id = $validatedData['kategori_id'];

    // // Handle video upload


    // // Update data bahan-bahan
    // $recipe->bahan = implode(', ', $validatedData['bahan']);

    // // Update data langkah-langkah
    // $recipe->langkah = implode(', ', $validatedData['langkah']);

    // // Handle langkah images
    // $langkah_images = [];
    // foreach ($validatedData['langkah'] as $index => $langkah) {
    //     // Jika ada gambar langkah
    //     if ($request->hasFile("langkah_image.$index")) {
    //         $langkah_images[] = $request->file("langkah_image.$index")->store('images/langkah');
    //     }
    // }

    // $recipe->langkah_image = json_encode($langkah_images);

    // // Simpan data yang di-update
    // $recipe->save();

    // // Redirect atau kembalikan respon sukses
    // return redirect()
    //     ->route('recipe.index')
    //     ->with('success', 'Resep berhasil diperbarui.');


    public function dashboard($id)
    {
        $recipe = Recipe::find($id); // Mengambil satu data berdasarkan ID
        if (!$recipe) {
            return redirect()->back()->with('error', 'Recipe not found.');
        }
        return view('user.tampilan', compact('recipe'));
    }

    public function produk()
    {
        $recipes = Recipe::all(); // Fetch all recipes
        return view('user.card', compact('recipes'));
    }


}
