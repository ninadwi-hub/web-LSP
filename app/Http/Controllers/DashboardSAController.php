<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardSAController extends Controller
{
    /**
     * Display SuperAdmin Dashboard
     */
    public function index()
    {
        // Pastikan hanya superadmin yang bisa akses
        if (Auth::user()->role !== 'superadmin') {
            abort(403, 'Unauthorized access');
        }
        $totalUsers = User::count();

        return view('admin.dashboardSA', compact('totalUsers'));
    }
}