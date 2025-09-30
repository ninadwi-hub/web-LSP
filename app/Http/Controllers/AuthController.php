<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
<<<<<<< HEAD
    /**
     * Tampilkan form login
     */
    public function showLogin() 
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::check()) {
            return $this->redirectToDashboard();
        }
        
        return view('auth.login');
    }

    /**
     * Response ketika login gagal
     */
=======
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Tampilkan error jika login gagal
>>>>>>> 7b10650a7f8560fcf8a9656db74811686325dd35
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('name'))
            ->with('error', 'Username atau password salah.');
    }
<<<<<<< HEAD

    /**
     * Process login
     */
    public function login(Request $request) 
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('name', 'password');

        // Attempt login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role user
            return $this->redirectToDashboard();
        }

        // Login gagal
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Logout user
     */
    public function logout(Request $request) 
=======

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
>>>>>>> 7b10650a7f8560fcf8a9656db74811686325dd35
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
<<<<<<< HEAD
        
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }

    /**
     * Redirect user ke dashboard sesuai role
     */
    protected function redirectToDashboard()
    {
        $user = Auth::user();

        // Cek apakah user adalah superadmin berdasarkan nama
        if ($user && $user->name === 'superadmin') {
            return redirect()->route('dashboardSA');
        }

        // Default redirect ke dashboard admin biasa
        return redirect()->route('admin.dashboard');
    }
}
=======
        return redirect('/login');
    }
}
>>>>>>> 7b10650a7f8560fcf8a9656db74811686325dd35
