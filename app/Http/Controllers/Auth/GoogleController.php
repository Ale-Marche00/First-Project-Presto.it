<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $googleUser->id)->first();

        if ($user) {
            Auth::login($user);

            return redirect()->route('homepage');
        } else {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make('Password@123'), // Genera una password casuale
            ]);

            if ($user) {
                Auth::login($user);

                return redirect()->route('homepage');
            } else {
                return redirect()->route('homepage')->with('error', 'Errore durante la registrazione.');
            }
        }
    }
}
