<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BeritaAcara extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'jadwal_id',
        'ruang_id',
        'pengawas1_id',
        'pengawas2_id',
        'catatan'
    ];

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function ruang(): BelongsTo
    {
        return $this->belongsTo(Ruang::class);
    }

    public function pengawas1(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'pengawas1_id', 'id');
    }

    public function pengawas2(): BelongsTo
    {
        return $this->belongsTo(Guru::class, 'pengawas2_id', 'id');
    }

    public function peserta_hadir(): HasMany
    {
        return $this->hasMany(PesertaHadir::class);
    }

    public function peserta_absen(): HasMany
    {
        return $this->hasMany(PesertaAbsen::class);
    }
}
