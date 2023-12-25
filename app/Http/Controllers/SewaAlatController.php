<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\SewaAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaAlatController extends Controller
{
    public function index()
    {
        $alats = Alat::where('unit', '>', 0)->get();
        $permohonans = SewaAlat::all();
        return view('pages.layanan.sewa-alat.index', ['alats' => $alats, 'permohonans' => $permohonans]);
    }

    public function create(Alat $alat)
    {
        return view('pages.layanan.sewa-alat.permohonan', ['alat' => $alat]);
    }

    public function store(Request $request, Alat $alat)
    {
        $request->validate([
            'nama_penyewa' => 'required|max:255',
            'alamat' => 'nullable',
            'no_hp' => 'required|unique:sewa_alats',
            'instansi' => 'nullable',
            'alat_id' => 'required',
            'user_id' => 'required',
            'lama_sewa_hari' => 'required',
            'syarat' => 'required',
        ]);

        $data = [
            'nama_penyewa' => $request->nama_penyewa,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'instansi' => $request->instansi,
            'alat_id' => $alat->id,
            'user_id' => Auth::id(),
            'lama_sewa_hari' => $request->nama_sewa_hari,
        ];

        SewaAlat::create($data);
        return redirect()->route('sewa-alat.create', $alat->slug)->with('success', 'Permohonan berhasil dibuat');
    }
}
