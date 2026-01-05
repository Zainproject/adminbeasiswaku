<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    use HasFactory;

    protected $table = 'proses';

    protected $fillable = [
        'pendaftar_id',
        'beasiswa_id',
        'status',
    ];

    // Relasi ke Pendaftar
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'pendaftar_id');
    }

    // Relasi ke Beasiswa
    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class, 'beasiswa_id');
    }
}
