<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'beasiswa';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'user_id',
        'nama_beasiswa',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_penerima',
        'status',
        'penyediabeasiswa_id',
    ];

    // Relasi ke PenyediaBeasiswa (satu beasiswa dimiliki oleh satu penyedia)
    public function penyedia()
    {
        return $this->belongsTo(PenyediaBeasiswa::class, 'penyediabeasiswa_id');
    }

    // // Relasi ke Pendaftaran (satu beasiswa bisa banyak pendaftar)
    // public function pendaftaran()
    // {
    //     return $this->hasMany(Pendaftaran::class, 'beasiswa_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
