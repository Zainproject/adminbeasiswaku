<?php

namespace App\Exports;

use App\Models\Beasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BeasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Beasiswa::all()->map(function ($item) {
            return [
                'Nama Beasiswa'  => $item->nama_beasiswa,
                'Deskripsi'      => $item->deskripsi,
                'Tanggal Mulai'  => $item->tanggal_mulai,
                'Tanggal Selesai' => $item->tanggal_selesai,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Beasiswa',
            'Deskripsi',
            'Tanggal Mulai',
            'Tanggal Selesai',
        ];
    }
}
