<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSAController extends Controller
{
    /**
     * Display SuperAdmin Dashboard
     */
    public function index()
    {
        // Pastikan hanya superadmin yang bisa akses
        if (Auth::user()->name !== 'superadmin') {
            abort(403, 'Unauthorized access');
        }

        return view('admin.dashboardSA');
    }
}