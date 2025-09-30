<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
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
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only('name'))
            ->with('error', 'Username atau password salah.');
    }

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
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
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