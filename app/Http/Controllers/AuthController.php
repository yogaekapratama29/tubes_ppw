<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
