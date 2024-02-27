<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaAcaraResource;
use App\Models\BeritaAcara;
use App\Models\Jadwal;
use App\Models\Ruang;
use Illuminate\Http\Request;

class BeritaAcaraV1 extends Controller
{
    public function show(Jadwal $jadwal,Ruang $ruang){
        $berita_acara = BeritaAcara::firstOrCreate([
            'jadwal_id'=>$jadwal->id,
            'ruang_id'=>$ruang->id
        ]);
        
        $berita_acara->load('jadwal');
        $berita_acara->load('ruang');
        $berita_acara->load('pengawas1');
        $berita_acara->load('pengawas2');
        $berita_acara->loadCount('peserta_hadir');
        $berita_acara->loadCount('peserta_absen');

        return new BeritaAcaraResource($berita_acara);
    }
}
