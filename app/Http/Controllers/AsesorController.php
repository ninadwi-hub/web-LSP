<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesorController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth'); // wajib login dulu
    }
    public function index()
    {
        return view('asesor.dashboard');
    }
}
