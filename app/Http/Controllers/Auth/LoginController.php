<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // tampilkan form login publik
    public function showLoginForm()
    {
        return view('publik.login'); // resources/views/publik/login.blade.php
    }

    // proses login publik
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // gunakan guard 'public' (sesuai config/auth.php)
        if (Auth::guard('publik')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('publik.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    // proses logout publik
    public function logout(Request $request)
    {
        Auth::guard('publik')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('publik.login');
    }
}
