<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaAbsen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'berita_acara_id',
        'nama'
    ];
}
