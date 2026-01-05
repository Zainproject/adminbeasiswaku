<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Beasiswa;
use App\Models\Penyediabeasiswa;
use App\Models\Proses;

class DataController extends Controller
{
    public function index()
    {
        $totalPendaftar = Pendaftar::count();
        $totalBeasiswa  = Beasiswa::count();
        $totalPenyedia  = Penyediabeasiswa::count();
        $totalPengajuan = Proses::count(); // jumlah data pengajuan

        return view('layout.main', compact(
            'totalPendaftar',
            'totalBeasiswa',
            'totalPenyedia',
            'totalPengajuan'
        ));
    }
}
