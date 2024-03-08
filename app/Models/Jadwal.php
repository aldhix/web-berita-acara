<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'hari',
        'tanggal',
        'jam_ke',
        'sesi',
        'waktu_mulai',
        'waktu_selesai',
        'nama_mapel',
        'aktif'
    ];

    public function berita_acara(): HasMany
    {
        return $this->hasMany(BeritaAcara::class);
    }
}
