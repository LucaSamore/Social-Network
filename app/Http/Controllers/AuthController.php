<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
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

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {

    }

    public function logout(Request $request)
    {

    }
}
