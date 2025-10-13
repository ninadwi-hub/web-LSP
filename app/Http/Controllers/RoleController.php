<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function switch($role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Harus login terlebih dahulu.');
        }

        $roles = explode(',', $user->role);

        if (in_array($role, $roles)) {
            $user->active_role = $role;
            $user->save();

            return redirect()->back()->with('success', "Role berhasil diubah menjadi: $role");
        }

        return redirect()->back()->with('error', 'Role tidak valid.');
    }
}
