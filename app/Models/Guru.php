<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nip'
    ];

    public function berita_acara1(): HasMany
    {
        return $this->hasMany(BeritaAcara::class, 'pengawas1_id', 'id');
    }

    public function berita_acara2(): HasMany
    {
        return $this->hasMany(BeritaAcara::class, 'pengawas2_id', 'id');
    }
}
