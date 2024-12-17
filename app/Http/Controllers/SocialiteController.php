<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        $registeredUser = User::where('google_id', $socialUser->id)->first();

        if (!$registeredUser) {
            // Jika user belum terdaftar, buat atau update user dengan data dari Google
            $user = User::updateOrCreate(
                ['google_id' => $socialUser->id], // Kondisi pencarian berdasarkan google_id
                [
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'google_token' => $socialUser->token,
                    'google_refresh_token' => $socialUser->refreshToken,
                    'nomor_telepon' => $socialUser->phoneNumber ?? 'default_phone',
                    'password' => Hash::make('default_password'),
                ]
            );

            Auth::login($user);

            return redirect('/beranda');
        }
        Auth::login($registeredUser);

        return redirect('/beranda');
    }
}
