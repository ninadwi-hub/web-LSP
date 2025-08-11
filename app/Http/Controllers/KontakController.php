<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
  use App\Models\Menu;

class KontakController extends Controller
{

public function showKontak()
{
    $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();
   return view('kontak', compact('menus')); // atau 'frontend.kontak' kalau kamu pakai subfolder
}

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

    return response()->json(['success' => 'Pesan berhasil dikirim!']);
}


    // Halaman manajemen kontak
public function index(Request $request)
{
    $query = Contact::query();

    if ($search = $request->input('search')) {
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('subject', 'like', "%{$search}%");
    }

    $contacts = $query->orderBy('created_at', 'desc')->paginate(10);

    return view('contacts.index', compact('contacts'));
}

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact')); // ✅ ganti path
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
    public function showForm() {
    return view('kontak'); // 
}

public function submit(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Contact::create([
    'name' => $validated['name'],
    'email' => $validated['email'],
    'subject' => $validated['subject'],
    'message' => $validated['message'],
    'status' => 'pending', // ✅ SESUAI ENUM
]);

    return response()->json(['success' => 'Pesan Anda telah terkirim!']);
}


}
