<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class DashboardPublikController extends Controller
{
    // Halaman dashboard publik
    public function index()
    {
        // sementara data kosong / statis
        $data = [
            'asesi'   => 0,
            'skema'   => 0,
            'asesor'  => 0,
            'unduhan' => 0,
        ];

        return view('publik.dashboard', $data);
    }
}
