<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KontakController extends Controller
{
    // KontakController.php
public function create()
{
    return view('fitur.contact.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email',
        'phone' => 'nullable|max:20',
        'subject' => 'nullable|max:100',
        'message' => 'required',
    ]);

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
        'status' => 'pending',
    ]);

   Contact::create($validated);

    return response()->json(['success' => 'Pesan berhasil dikirim!']);
}


    // Halaman manajemen kontak
    public function index()
{
    $contacts = Contact::latest()->paginate(10)->withQueryString();
    return view('kontak.index', compact('contacts'));
}

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('kontak.edit', compact('contact')); // ✅ ganti path
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate(['status' => 'required|string|max:20']);

        $contact->status = $request->status;
        if ($request->status === 'selesai') {
            $contact->responded_at = Carbon::now();
        }
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
