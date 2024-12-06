<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route untuk halaman login
Route::get('/login', function () {
    return view('loginPage');
})->name('login');

// Route untuk registrasi

Route::get('signup', [SignupController::class, 'index'])->name('register'); // Halaman registrasi
Route::post('signup', [SignupController::class, 'store']); // Proses registrasi

// Route untuk proses login dan logout
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Route khusus untuk admin, hanya bisa diakses jika login sebagai admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('Admin/adminPage');
});

// Route khusus untuk user biasa, hanya bisa diakses jika login sebagai user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/beranda', [UserController::class, 'dashboard'])->name('berandaPage');
});

// Halaman Beranda setelah login
Route::get('/beranda', [HomeController::class, 'index'])->middleware('auth');

// Halaman khusus untuk admin
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'role:admin']); // Hanya bisa diakses oleh admin

// Halaman khusus untuk user
Route::get('/user', [UserController::class, 'index'])
    ->middleware(['auth', 'role:user']); // Hanya bisa diakses oleh user

Route::get('/', function () {
    return view('HomePage');
});

Route::get('/beranda', function () {
    return view('berandaPage');
});

Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route bagian Admin User
Route::get('/admin/user', [UserController::class, 'index']);
// Route untuk menampilkan halaman daftar pengguna
Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');

// Route untuk menyimpan pengguna baru
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');

// Route untuk memperbarui data pengguna yang ada
Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');

// Route untuk menghapus pengguna
Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// Route::get('/admin/resep', function () {
//     return view('Admin/resepPage');
// });

Route::get('/admin/komentar', function () {
    return view('Admin/komentarPage');
});

Route::get('/writeresep', function () {
    return view('writeResepPage');
});


Route::get('/notifikasi', [NotificationController::class, 'show']);

Route::get('/profil', function () {
    return view('profilPage');
});

Route::get('/editprofil', function () {
    return view('editprofilePage');
});

Route::get('/updateprofil', function () {
    return view('updateprofilPage');
});

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/editprofil', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
//Route::post('/updateprofil',[ProfileController::class, 'update'] )->name('updateprofil');

Route::get('/resep/{id}', [RecipeController::class, 'show'])->name('resep.show');
Route::post('/resep/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifikasi/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');


Route::middleware(['auth'])->group(function () {
    Route::get('/resep/{id}', [RecipeController::class, 'show'])->name('resep.show');
    Route::post('/resep/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
});
// Route::match(['get', 'post'], '/resep/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/add', [RecipeController::class, 'addComment']);
Route::delete('/comment/{id}', [RecipeController::class, 'destroy'])->name('comment.destroy');

Route::post('/comments/read/{id}', [NotificationController::class, 'read'])->name('comments.read');
Route::get('/comments/readed', [NotificationController::class, 'readed'])->name('comments.readed');

Route::get('/recipes', function () {
    return view('resepdetailPage');
});

Route::get('/resep', function () {
    return view('searchresepPage');
});

// Route::get('/resep/cari', [RecipeController::class, 'search'])->name('resep.search');

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);

Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);
// Fungsi untuk login dengan Google
Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/pencarian', function () {
    return view('pencarianresepPage');
});

Route::get('/search', [RecipeController::class, 'search'])->name('recipes.search');

// Route::resource('kategori', KategoriController::class);
Route::resource('recipe', RecipeController::class);
Route::apiResource('recipes', RecipeController::class);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/resep', [RecipeController::class, 'adminIndex'])->name('admin.recipes.index');
    Route::get('/admin/resep/create', [RecipeController::class, 'create'])->name('admin.recipes.create');
    Route::post('/admin/resep', [RecipeController::class, 'store'])->name('admin.recipes.store');
    Route::get('/admin/resep/{id}', [RecipeController::class, 'show'])->name('admin.recipes.show');
    Route::get('/admin/resep/{id}/edit', [RecipeController::class, 'adminEdit'])->name('admin.recipes.edit');
    Route::put('/admin/resep/{id}', [RecipeController::class, 'update'])->name('admin.recipes.update');
    Route::delete('/admin/resep/{id}', [RecipeController::class, 'destroy'])->name('admin.recipes.destroy');
});