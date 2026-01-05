<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    // Paksa Eloquent pakai tabel 'pendaftar'
    protected $table = 'pendaftar';

    protected $fillable = [
        'user_id',
        'nim',
        'nama_lengkap',
        'universitas',
        'program_studi',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
