<?php

namespace App\Http\Controllers;

use App\Models\JadwalAsesmen;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalAsesmenController extends Controller
{
    public function index()
    {
        $jadwals = JadwalAsesmen::with(['skema', 'asesorUji', 'asesorValidator'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $skemas = Skema::all();
        $asesors = User::where('role', 'asesor')->get();

        return view('sa.Persiapan.jadwal.index', compact('jadwals', 'skemas', 'asesors'));
    }

    public function create()
    {
        $skemas = Skema::all();
        $asesors = User::where('role', 'asesor')->get();

        return view('sa.Persiapan.jadwal.create', compact('skemas', 'asesors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_sk' => 'required|string|max:255',
            'tgl_terbit_sk' => 'required|date',
            'tanggal_asesmen' => 'required|date',
            'skema_id' => 'required|exists:skemas,id',
            'tipe' => 'required|in:Nirkertas,SJJ',
            'harga' => 'required|numeric|min:0',
            'kuota' => 'required|integer|min:0',
            'asesor_uji' => 'required|array|min:1',
            'asesor_uji.*' => 'exists:users,id',
            'lead_uji' => 'required|in:' . implode(',', $request->asesor_uji ?? []),
            'asesor_validator' => 'required|array|min:1',
            'asesor_validator.*' => 'exists:users,id',
            'lead_validator' => 'required|in:' . implode(',', $request->asesor_validator ?? []),
        ]);

        DB::beginTransaction();
        try {
            $jadwal = JadwalAsesmen::create([
                'no_sk' => $validated['no_sk'],
                'tgl_terbit_sk' => $validated['tgl_terbit_sk'],
                'tanggal_asesmen' => $validated['tanggal_asesmen'],
                'skema_id' => $validated['skema_id'],
                'tipe' => $validated['tipe'],
                'harga' => $validated['harga'],
                'kuota' => $validated['kuota'],
            ]);

            foreach ($validated['asesor_uji'] as $asesor_id) {
                $jadwal->asesorUji()->attach($asesor_id, [
                    'role' => 'uji',
                    'is_lead' => $asesor_id == $validated['lead_uji']
                ]);
            }

            foreach ($validated['asesor_validator'] as $asesor_id) {
                $jadwal->asesorValidator()->attach($asesor_id, [
                    'role' => 'validator',
                    'is_lead' => $asesor_id == $validated['lead_validator']
                ]);
            }

            DB::commit();
            return redirect()->route('sa.persiapan.jadwal.index')
                ->with('success', 'Jadwal asesmen berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan jadwal: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(JadwalAsesmen $jadwal)
    {
        $jadwal->load(['skema', 'asesorUji', 'asesorValidator']);
        $skemas = Skema::all();
        $asesors = User::where('role', 'asesor')->get();

        return view('sa.Persiapan.jadwal.edit', compact('jadwal', 'skemas', 'asesors'));
    }

    public function update(Request $request, JadwalAsesmen $jadwal)
    {
        $validated = $request->validate([
            'no_sk' => 'required|string|max:255',
            'tgl_terbit_sk' => 'required|date',
            'tanggal_asesmen' => 'required|date',
            'skema_id' => 'required|exists:skemas,id',
            'tipe' => 'required|in:Nirkertas,SJJ',
            'harga' => 'required|numeric|min:0',
            'kuota' => 'required|integer|min:0',
            'asesor_uji' => 'required|array|min:1',
            'asesor_uji.*' => 'exists:users,id',
            'lead_uji' => 'required|in:' . implode(',', $request->asesor_uji ?? []),
            'asesor_validator' => 'required|array|min:1',
            'asesor_validator.*' => 'exists:users,id',
            'lead_validator' => 'required|in:' . implode(',', $request->asesor_validator ?? []),
        ]);

        DB::beginTransaction();
        try {
            $jadwal->update([
                'no_sk' => $validated['no_sk'],
                'tgl_terbit_sk' => $validated['tgl_terbit_sk'],
                'tanggal_asesmen' => $validated['tanggal_asesmen'],
                'skema_id' => $validated['skema_id'],
                'tipe' => $validated['tipe'],
                'harga' => $validated['harga'],
                'kuota' => $validated['kuota'],
            ]);

            $syncDataUji = [];
            foreach ($validated['asesor_uji'] as $asesor_id) {
                $syncDataUji[$asesor_id] = [
                    'role' => 'uji',
                    'is_lead' => $asesor_id == $validated['lead_uji']
                ];
            }
            $jadwal->asesorUji()->sync($syncDataUji);

            $syncDataValidator = [];
            foreach ($validated['asesor_validator'] as $asesor_id) {
                $syncDataValidator[$asesor_id] = [
                    'role' => 'validator',
                    'is_lead' => $asesor_id == $validated['lead_validator']
                ];
            }
            $jadwal->asesorValidator()->sync($syncDataValidator);

            DB::commit();
            return redirect()->route('sa.persiapan.jadwal.index')
                ->with('success', 'Jadwal asesmen berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui jadwal: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(JadwalAsesmen $jadwal)
    {
        try {
            $jadwal->delete();
            return redirect()->route('sa.persiapan.jadwal.index')
                ->with('success', 'Jadwal asesmen berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus jadwal: ' . $e->getMessage());
        }
    }
}
