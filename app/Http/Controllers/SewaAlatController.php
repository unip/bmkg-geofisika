<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class SewaAlatController extends Controller
{
    public function index()
    {
        $alat = Alat::all();
        return view('pages.layanan.sewa-alat', ['alat' => $alat]);
    }
}
