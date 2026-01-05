<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyediaBeasiswa extends Model
{
    use HasFactory;

    protected $table = 'penyediabeasiswa';

    protected $fillable = [
        'user_id',
        'nama_penyedia',
        'alamat',
        'kontak',
    ];

    // Relasi: satu penyedia punya banyak beasiswa
    public function beasiswa()
    {
        return $this->hasMany(Beasiswa::class, 'penyediabeasiswa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
