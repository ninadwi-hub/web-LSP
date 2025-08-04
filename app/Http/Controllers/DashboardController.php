<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
{
    $totalUsers = User::count();
    $totalPages = Page::count();
    $totalContacts = Contact::count();
    $totalGaleri = Galeri::count();

    // Aktivitas terbaru
    $latestContacts = Contact::latest()->take(5)->get(); // 5 pesan terakhir
    $latestGaleri = Galeri::latest()->take(3)->get();    // 3 galeri terbaru

    return view('admin.dashboard', compact(
        'totalUsers', 'totalPages', 'totalContacts', 'totalGaleri',
        'latestContacts', 'latestGaleri'
    ));
}}
