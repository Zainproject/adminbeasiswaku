<?php

namespace App\Exports;

use App\Models\Proses;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProsesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Proses::all()->map(function ($item) {
            return [
                'Pendaftar ID'   => $item->pendaftar_id,
                'Beasiswa ID'    => $item->beasiswa_id,
                'Status'         => $item->status,
                'Tanggal Proses' => $item->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Pendaftar ID',
            'Beasiswa ID',
            'Status',
            'Tanggal Proses',
        ];
    }
}
