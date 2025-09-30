<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsesiController extends Controller
{
    public function index()
    {
        return view('asesi.dashboard');
    }
}
