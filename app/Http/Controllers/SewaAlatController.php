<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\SewaAlat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaAlatController extends Controller
{
    public function index()
    {
        $alats = Alat::where('unit', '>', 0)->get();
        $permohonan = SewaAlat::all();
        return view('pages.layanan.sewa-alat.index', ['alats' => $alats, 'permohonan' => $permohonan]);
    }

    public function create(Alat $alat)
    {
        $permohonan = SewaAlat::all();
        return view('pages.layanan.sewa-alat.permohonan', ['alat' => $alat, 'permohonan' => $permohonan]);
    }

    public function store(Request $request, Alat $alat)
    {
        // dd($request->all(), $alat);

        $validated = $request->validate([
            'lama_sewa_hari' => 'required',
            'banyak_unit' => 'required',
            'keterangan' => 'nullable',
            'syarat' => 'required',
        ]);

        $data = $validated;
        $data['alat_id'] = $alat->id;
        $data['user_id'] = Auth::id();

        // Cek jika unit tersedia lebih sedikit dari banyak permohonan
        // maka return error
        if ($alat->unit < $data['banyak_unit']) {
            return back()->with('error', 'Alat yang tersedia tidak cukup');
        }

        try {
            // buat permohonan
            SewaAlat::create($data);

            // update jumlah unit tersedia di tabel alat
            $alat->update(['unit' => $alat->unit - $data['banyak_unit']]);

            // sukses membuat permohonan
            return back()->with('success', 'Permohonan berhasil dibuat');
        } catch (Exception $error) {
            report($error->getMessage());
            return back()->with('error', 'Permohonan gagal dibuat');
        }
    }
}
