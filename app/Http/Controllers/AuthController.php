<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Tampilkan error jika login gagal
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('name'))
            ->with('error', 'Username atau password salah.');
    }

    // Proses login
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'required|string|max:255'
    ]);

    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();

        // Multi-role: hapus spasi di role
        $roles = array_map('trim', explode(',', $user->role));

        // Redirect sesuai prioritas role
        if (in_array('asesor', $roles)) {
            return redirect()->route('asesor.dashboard');
        } elseif (in_array('asesi', $roles)) {
            return redirect()->route('asesi.dashboard');
        } elseif (in_array('superadmin', $roles)) {
            return redirect()->route('admin.dashboard'); // superadmin ke dashboard admin
        } elseif (in_array('admin', $roles)) {
            return redirect()->route('admin.dashboard'); // admin ke dashboard admin
        }

        // fallback kalau role tidak ada
        return redirect()->route('dashboard'); 
    }

    return $this->sendFailedLoginResponse($request);
}


    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
