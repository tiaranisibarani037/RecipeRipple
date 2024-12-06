<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Kategori;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{

    public function index()
    {
        try {
            // Ambil semua data resep terbaru dengan pagination dan komentar terkait
            $recipes = Recipe::with('comments')->latest()->paginate(10);

            // Tambahkan link HATEOAS untuk setiap resep
            foreach ($recipes as $recipe) {
                $recipe->links = [
                    'self' => route('recipes.show', ['recipe' => $recipe->id]),
                    'create' => route('recipes.store'),
                    'update' => route('recipes.update', ['recipe' => $recipe->id]),
                    'delete' => route('recipes.destroy', ['recipe' => $recipe->id]),
                ];
            }

            return view('recipes.index', compact('recipes'));
        } catch (\Exception $e) {
            // Log error jika terjadi masalah saat memuat data
            Log::error('Error displaying recipes: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load recipes.'], 500);
        }
    }

    public function adminIndex()
    {
        try {
            $recipes = Recipe::with('category')->orderBy('created_at', 'asc')->get();
            $categories = Category::all(); // Ambil semua kategori
            return view('Admin.resepPage', compact('recipes', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error displaying admin recipes: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to load admin recipes.']);
        }
    }

    public function create()
    {
        try {
            $categories = Category::all(); // Ambil semua kategori

            // Tambahkan link HATEOAS untuk kategori
            foreach ($categories as $category) {
                $category->links = [
                    'self' => route('categories.show', ['category' => $category->id]),
                    'create' => route('categories.store'),
                    'update' => route('categories.update', ['category' => $category->id]),
                    'delete' => route('categories.destroy', ['category' => $category->id]),
                ];
            }

            return response()->json([
                'categories' => $categories,
                'links' => [
                    'self' => route('recipes.create'),
                    'store' => route('recipes.store'),
                ]
            ]);
        } catch (\Exception $e) {
            Log::error('Error displaying create recipe form: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to load create recipe form.'], 500);
        }
    }


    // Simpan resep baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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

        // Store the recipe data, using implode() for 'bahan' and 'langkah'
        $recipe = Recipe::create([
            'video_path' => $filename,
            'name' => $request->name,
            'description' => $request->description,
            'kategori_id' => $request->kategori_id,
            'bahan' => implode(', ', $request->bahan),  // Store as a comma-separated string
            'langkah' => implode(', ', $request->langkah),  // Store as a comma-separated string
            'langkah_image' => json_encode($langkah_images),
        ]);

        if ($recipe) {
            // Tambahkan link HATEOAS
            $recipe->links = [
                'self' => route('recipes.show', ['recipe' => $recipe->id]),
                'create' => route('recipes.store'),
                'update' => route('recipes.update', ['recipe' => $recipe->id]),
                'delete' => route('recipes.destroy', ['recipe' => $recipe->id]),
            ];

            return response()->json($recipe, 201);
        }

        return response()->json(['error' => 'Failed to create recipe.'], 500);
    }

    // Cari resep berdasarkan nama, deskripsi, atau bahan
    public function search(Request $request)
    {
        try {
            $query = $request->input('query');

            // Pencarian berdasarkan nama, deskripsi, atau bahan
            $recipes = Recipe::where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%')
                ->orWhereJsonContains('bahan', $query)
                ->get();

            // Tambahkan link HATEOAS untuk setiap resep
            foreach ($recipes as $recipe) {
                $recipe->links = [
                    'self' => route('recipes.show', ['recipe' => $recipe->id]),
                    'create' => route('recipes.store'),
                    'update' => route('recipes.update', ['recipe' => $recipe->id]),
                    'delete' => route('recipes.destroy', ['recipe' => $recipe->id]),
                ];
            }

            return response()->json(['recipes' => $recipes, 'query' => $query]);
        } catch (\Exception $e) {
            Log::error('Error searching recipes: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to perform search.'], 500);
        }
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return redirect()->back()->withErrors(['error' => 'Recipe not found']);
        }

        $comments = Comment::where('recipe_id', $id)->get();
        $unreadNotificationsCount = Notification::where('user_id', Auth::id())->where('is_read', false)->count();

        // Tambahkan link HATEOAS
        $recipe->links = [
            'self' => route('recipes.show', ['recipe' => $recipe->id]),
            'create' => route('recipes.store'),
            'update' => route('recipes.update', ['recipe' => $recipe->id]),
            'delete' => route('recipes.destroy', ['recipe' => $recipe->id]),
        ];

        return view('resepPage', compact('recipe', 'comments', 'unreadNotificationsCount'));
    }

    public function adminShow($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            abort(404, 'Recipe not found');
        }

        $counts = 0;
        $comments = Comment::where('recipe_id', $id)->get();
        return view('Admin.recipe.show', compact('recipe', 'counts', 'comments'));
    }

    public function adminDestroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('Admin.resepPage')->with('success', 'Recipe deleted successfully');
    }

    public function destroy($id)
    {
        try {
            $recipe = Recipe::find($id);

            if (!$recipe) {
                return response()->json(['error' => 'Recipe not found'], 404);
            }

            $recipe->delete();

            return response()->json([
                'message' => 'Recipe deleted successfully',
                'links' => [
                    'index' => route('recipes.index'),
                    'create' => route('recipes.create'),
                    'store' => route('recipes.store'),
                ]
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error deleting recipe: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete recipe.'], 500);
        }
    }

    public function adminEdit($id)
    {
        $recipe = Recipe::find($id);
        $categories = Category::all();
        return view('Admin.recipe.edit', compact('recipe', 'categories'));
    }

    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $kategori = Category::all();
        return view('recipe.edit', compact('recipe', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'video' => 'nullable|mimes:mp4,avi,mov|max:50000',
            'bahan' => 'required|array',
            'bahan.*' => 'string',
            'langkah' => 'required|array',
            'langkah.*' => 'string',
            'langkah_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan data resep berdasarkan ID
        $recipe = Recipe::findOrFail($id);

        // Update data utama resep
        $recipe->name = $validatedData['name'];
        $recipe->description = $validatedData['description'];
        $recipe->kategori_id = $validatedData['kategori_id'];

        // Handle video upload
        if ($request->hasFile('video')) {
            // Hapus video lama jika ada
            if ($recipe->video) {
                Storage::delete($recipe->video);
            }

            // Simpan video baru
            $recipe->video = $request->file('video')->store('videos');
        }

        // Update data bahan-bahan (jika ada relasi)
        $recipe->bahan()->delete(); // Hapus bahan lama
        foreach ($validatedData['bahan'] as $bahan) {
            $recipe->bahan()->create(['nama' => $bahan]);
        }

        // Update data langkah-langkah (jika ada relasi)
        $recipe->langkah()->delete(); // Hapus langkah lama
        foreach ($validatedData['langkah'] as $index => $langkah) {
            $langkahData = [
                'deskripsi' => $langkah,
            ];

            // Jika ada gambar langkah
            if ($request->hasFile("langkah_image.$index")) {
                $langkahData['gambar'] = $request->file("langkah_image.$index")->store('images/langkah');
            }

            $recipe->langkah()->create($langkahData);
        }

        // Simpan data yang di-update
        $recipe->save();

        // Redirect atau kembalikan respon sukses
        return redirect()
            ->route('recipe.index')
            ->with('success', 'Resep berhasil diperbarui.');
    }

    public function rate(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min=1|max=5',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->ratings()->create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
        ]);

        // Buat notifikasi untuk pemilik resep
        Notification::create([
            'user_id' => $recipe->user_id,
            'recipe_id' => $recipe->id,
            'type' => 'rating',
            'message' => 'Ada rating baru pada resep Anda.',
        ]);

        return response()->json(['success' => true]);
    }
}
