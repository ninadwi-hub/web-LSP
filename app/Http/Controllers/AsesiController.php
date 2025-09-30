<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsesiController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth'); // wajib login dulu
    }
    public function index()
    {
        return view('asesi.dashboard');
    }
}
