<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Beasiswa;
use App\Models\PenyediaBeasiswa;
use App\Models\Proses;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendaftarExport;
use App\Exports\BeasiswaExport;
use App\Exports\PenyediaBeasiswaExport;
use App\Exports\ProsesExport;

class ExportController extends Controller
{
    public function pendaftar()
    {
        return Excel::download(new PendaftarExport, 'pendaftar.xlsx');
    }

    public function beasiswa()
    {
        return Excel::download(new BeasiswaExport, 'beasiswa.xlsx');
    }

    public function penyediabeasiswa()
    {
        return Excel::download(new PenyediaBeasiswaExport, 'penyedia_beasiswa.xlsx');
    }

    public function proses()
    {
        return Excel::download(new ProsesExport, 'proses.xlsx');
    }
}
