<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $biodata = Biodata::firstOrCreate(['user_id' => $user->id], [
            'nama_lengkap' => $user->name,
            'email' => $user->email,
            'no_hp' => $user->phone ?? '',
        ]);

        return view('publik.asesi.biodata', compact('user', 'biodata'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $biodata = Biodata::where('user_id', $user->id)->first();

        $data = $request->except(['_token', '_method']);
        
        // upload file
        foreach (['foto','ktp','ijazah','sertifikat','cv','tanda_tangan'] as $field) {
            if ($request->hasFile($field)) {
                $fileName = $field.'_'.$user->id.'.'.$request->file($field)->getClientOriginalExtension();
                $path = $request->file($field)->storeAs('biodata/'.$user->id, $fileName, 'public');
                $data[$field] = $path;
            }
        }

        $biodata->update($data);

        return redirect()->back()->with('success', 'Biodata berhasil diperbarui!');
    }
}
