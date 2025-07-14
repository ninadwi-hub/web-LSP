<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    // ✅ Untuk halaman publik: form kontak
  public function showForm()
{
    return view('kontakk'); // arahkan ke kontakk.blade.php
}


    // ✅ Proses kirim pesan dari form kontak publik
    public function submitForm(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|max:150',
            'message' => 'required',
            'phone'   => 'nullable|max:20',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim.');
    }

    // ✅ Untuk admin: lihat daftar pesan kontak
    public function index()
    {
        $contacts = Contact::latest()->get(); // Ambil semua pesan
        return view('contacts.panel.kontak', compact('contacts')); // arahkan ke panel admin
    }

}
