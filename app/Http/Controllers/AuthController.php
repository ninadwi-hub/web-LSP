<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
public function showLogin() {
return view('auth.login');
}

protected function sendFailedLoginResponse(Request $request)
{
return redirect()->back()
->withInput($request->only('email'))
->with('error', 'Email atau password salah.');
}

 public function login(Request $request) {
        // gunakan email dan password untuk login
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // cek multi role (comma-separated)
            $roles = explode(',', $user->role);

            // redirect sesuai role (prioritas admin > asesor > asesi)
            if (in_array('admin', $roles)) {
                return redirect()->route('admin.dashboard');
            } elseif (in_array('asesor', $roles)) {
                return redirect()->route('asesor.dashboard');
            } elseif (in_array('asesi', $roles)) {
                return redirect()->route('asesi.dashboard');
            }
        }

        return $this->sendFailedLoginResponse($request);
    }

public function logout(Request $request) {
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/login');
}
}
