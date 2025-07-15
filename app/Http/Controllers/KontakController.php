<?php

namespace App\Http\Controllers;

use App\Models\Contact; // ✅ Ini sudah benar

use Illuminate\Http\Request;

class KontakController extends Controller
{
    // ✅ Untuk halaman publik: form kontak
    public function showForm()
    {
        return view('kontakk'); // arahkan ke kontakk.blade.php
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'nullable|max:150',
            'message' => 'required',
            'phone'   => 'nullable|max:20',
        ]);

        Contact::create($request->all()); // ✅ ganti ke Contact

        return redirect()->route('contacts.panel.kontak')->with('success', 'Pesan Anda berhasil dikirim.');
    }

    // ✅ Untuk admin: lihat daftar pesan kontak
    public function index()
    {
        $contacts = Contact::latest()->get(); // ✅ ganti ke Contact
        return view('contacts.panel.kontak', compact('contacts'));
    }
    public function edit($id)
{
    $contact = Contact::findOrFail($id);
    return view('contacts.panel.edit', compact('contact'));
}

public function update(Request $request, $id)
{
    $contact = Contact::findOrFail($id);

    $request->validate([
        'status' => 'required|string|max:20',
    ]);

    $contact->status = $request->status;
    $contact->save();

    return redirect()->route('contacts.panel.kontak')->with('success', 'Status pesan berhasil diperbarui.');
}

public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('contacts.panel.kontak')->with('success', 'Pesan berhasil dihapus.');
}

}
