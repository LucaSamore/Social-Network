<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()
            ->withErrors(['email' => 'Email o password non corrette',])
            ->onlyInput('email');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User($request->validated());

        if ($user->save()) {
            $user->refresh();
            auth()->login($user);
            return redirect('/home')->with('Success', 'Account creato con successo');
        }
        
        // ! TODO: make custom error message when registration fails
        return back()
            ->withErrors(['email' => 'Email o password non corrette',])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
