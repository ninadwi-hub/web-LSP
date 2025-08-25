<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('publik.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'role' => 'required|in:asesi,tuk',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:login_users,phone',
            'email' => 'required|string|email|max:255|unique:login_users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Simpan user baru
        $user = LoginUser::create([
            'role' => $request->role,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah register
        auth()->login($user);

        return redirect()->route('publik.dashboard')
                         ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name);
    }
}
