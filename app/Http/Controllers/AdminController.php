<?php

namespace App\Http\Controllers;

use App\Models\Asuransi;
use App\Models\Magang;
use App\Models\SewaAlat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sewa_alat = SewaAlat::all();
        $magang = Magang::all();
        $asuransi = Asuransi::all();
        $permohonan = collect([]);

        $data = [
            'title' => 'Dashboard',
            'sewa_alat' => $sewa_alat,
            'magang' => $magang,
            'asuransi' => $asuransi,
            'permohonan' => $permohonan,
        ];

        return view('pages.admin.dashboard', $data);
    }
}
