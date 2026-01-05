<?php

namespace App\Exports;

use App\Models\PenyediaBeasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenyediaBeasiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return PenyediaBeasiswa::all()->map(function ($item) {
            return [
                'Nama Penyedia'  => $item->nama_penyedia,
                'Email'          => $item->email,
                'Alamat'         => $item->alamat,
                'No HP'          => $item->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Penyedia',
            'Email',
            'Alamat',
            'No HP',
        ];
    }
}
