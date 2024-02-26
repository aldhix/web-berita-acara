<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ruang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama_ruang',
        'kelas'
    ];

    public function berita_acara(): HasMany
    {
        return $this->hasMany(BeritaAcara::class);
    }
}
