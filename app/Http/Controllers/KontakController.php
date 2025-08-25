<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Menu;

class KontakController extends Controller
{
    /**
     * Halaman kontak publik
     */
    public function showKontak()
    {
        $menus = Menu::with('children')
            ->whereNull('parent_id')
            ->orderBy('order')
            ->paginate(10); // Menambahkan pagination di sini

        return view('kontak', compact('menus')); 
        // atau 'frontend.kontak' sesuai struktur folder kamu
    }

    /**
     * Form kontak publik (opsional, jika pisah dengan showKontak)
     */
    public function showForm() 
    {
        return view('kontak');
    }

    /**
     * Simpan data kontak dari publik (AJAX / form biasa)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'phone'   => 'nullable|max:20',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name'   => $validated['name'],
            'email'  => $validated['email'],
            'phone'  => $request->phone,
            'subject'=> $request->subject,
            'message'=> $validated['message'],
            'status' => 'pending',
        ]);

        return response()->json(['success' => 'Pesan berhasil dikirim!']);
    }

    /**
     * Halaman manajemen kontak (admin)
     */
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
        // ✅ aku ganti ke folder "panel" biar konsisten sama struktur LSP kamu
    }

    /**
     * Edit kontak (admin)
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update status kontak (admin)
     */
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

    /**
     * Hapus kontak (admin)
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
