<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\homeController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\signupController;

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


// Route::get('/login', [loginController::class, 'index']);

Route::get('/login', function(){
    return view('loginPage');
});

Route::get('/signup', [signupController::class, 'index']); 
Route::post('/signup', [signupController::class, 'store']);

Route::post('postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');


Route::get('/', function () {
    return view('HomePage');

});

Route::get('/admin', function () {
    return view('Admin/LoginAdminPage');
});

Route::get('/writeresep', function () {
    return view('writeResepPage');
});

Route::get('/resep', function () {
    return view('resepPage');
});

Route::get('/notifikasi', function () {
    return view('notifikasiPage');
});

Route::get('/profil', function () {
    return view('profilPage');
});

Route::get('/editprofil', function () {
    return view('editprofilePage');
});

Route::get('/updateprofil', function () {
    return view('updateprofilPage');
});
Route::post('/updateprofil', 'ProfileController@update')->name('updateprofil');
