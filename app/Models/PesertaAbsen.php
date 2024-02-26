<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PesertaAbsen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'berita_acara_id',
        'nama'
    ];

    public function berita_acara(): BelongsTo
    {
        return $this->belongsTo(BeritaAcara::class);
    }
}
