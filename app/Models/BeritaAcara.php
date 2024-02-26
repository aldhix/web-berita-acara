<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'jadwal_id',
        'ruang_id',
        'pengawas1_id',
        'pengawas2_id',
        'kelas',
        'catatan'
    ];
}
