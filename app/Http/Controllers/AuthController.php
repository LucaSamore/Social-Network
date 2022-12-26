<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

final class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors(['error' => 'Login fallito, utente non trovato']);
    }

    public function register(RegisterRequest $request)
    {
        $user = new User(array_merge(array($request->validated(), 'id' => (string) Str::uuid())));
        $user->password = Hash::make($user->password);
        dd($user->username);
        if ($user->save()) {
            $user->refresh();
            auth()->login($user);
            return redirect('/home')->with('success', 'Account creato con successo');
        }

        return back()->withErrors(['error' => 'Registrazione fallita']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
