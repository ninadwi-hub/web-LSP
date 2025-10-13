<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan form login
     */
    public function showLogin()
    {
        // Jika sudah login, langsung redirect ke dashboard sesuai role
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
     * Proses login
     */
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'required|string|max:255'
    ]);

    $credentials = $request->only('name', 'password');

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        // =============================
        // Tambahkan logika active_role
        // =============================
       $user = Auth::user();
        $roles = array_map('trim', explode(',', $user->role));
        $activeRole = $roles[0] ?? $user->role;

        // Simpan ke DB
        $user->active_role = $activeRole;
        $user->save(); // pastikan pakai save()

        // Simpan ke session
        session(['active_role' => $activeRole]);


        return $this->redirectToDashboard();
    }

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

        if (!$user) {
            return redirect()->route('login');
        }

        // Multi-role: jika field role berisi lebih dari satu
        $roles = array_map('trim', explode(',', $user->role));

        if (in_array('superadmin', $roles)) {
            return redirect()->route('dashboardSA'); // superadmin ke dashboard admin
        } elseif (in_array('admin', $roles)) {
            return redirect()->route('admin.dashboard');
        } elseif (in_array('asesi', $roles)) {
            return redirect()->route('asesi.dashboard');
        } elseif (in_array('asesor', $roles)) {
            return redirect()->route('asesor.dashboard');
        }

        // fallback jika role tidak dikenali
        return redirect()->route('dashboard');
    }
    
}
