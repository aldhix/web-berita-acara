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
    public function show(Request $request, Jadwal $jadwal,Ruang $ruang){
        
        $beritaAcara = BeritaAcara::firstOrCreate([
            'jadwal_id'=>$jadwal->id,
            'ruang_id'=>$ruang->id
        ]);

        $beritaAcara->load('jadwal');
        $beritaAcara->load('ruang');
        $beritaAcara->load('pengawas1');
        $beritaAcara->load('pengawas2');
        $beritaAcara->loadCount('peserta_hadir');
        $beritaAcara->loadCount('peserta_absen');

        return new BeritaAcaraResource($beritaAcara);
    }
}
