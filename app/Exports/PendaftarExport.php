<?php

namespace App\Exports;

use App\Models\Pendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftar::with('user')->get()->map(function ($item) {
            return [
                'NIM'            => $item->nim,
                'Nama Lengkap'   => $item->nama_lengkap,
                'Email'          => $item->user->email ?? '',
                'Program Studi'  => $item->program_studi,
                'Universitas'    => $item->universitas,
                'Tanggal Lahir'  => $item->tanggal_lahir,
                'Alamat'         => $item->alamat,
                'No HP'          => $item->no_hp,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama Lengkap',
            'Email',
            'Program Studi',
            'Universitas',
            'Tanggal Lahir',
            'Alamat',
            'No HP',
        ];
    }
}
