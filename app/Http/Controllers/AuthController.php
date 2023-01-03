<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

final class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            $user = User::where('email', $request->email)->first();
            session(['user_id' => $user->id]);
            session(['user_name' => $user->name]);
            session(['username' => $user->username]);
            return redirect('/home');
        }

        return back()->withErrors(['error' => 'Login fallito, utente non trovato']);
    }

    public function register(RegisterRequest $request)
    {
        $request->validated();
        $uploadedFileUrl = null;

        if ($request->file('profile_image') !== null) {
            $uploadedFileUrl = Cloudinary::upload($request->file('profile_image')->getRealPath())->getSecurePath();
        }

        $user = new User(
            [
                'id' => (string) Str::uuid(),
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'date_of_birth' => $request->date_of_birth,
                'bio' => $request->bio,
                'profile_image' => $uploadedFileUrl
            ]
        );

        if ($user->save()) {
            $user->refresh();
            auth()->login($user);
            session(['user_id' => $user->id]);
            session(['user_name' => $user->name]);
            session(['username' => $user->username]);
            return redirect('/home')->with('success', '🥳 Account creato con successo! 🥳');
        }

        return back()->with('error', 'Registrazione fallita 🙄');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
