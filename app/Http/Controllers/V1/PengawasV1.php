<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaAcaraResource;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;

class PengawasV1 extends Controller
{
    public function store(BeritaAcara $beritaAcara, Request $request)
    {

        $request->validate([
            'pengawas1' => ['required', 'exists:gurus,id'],
            'pengawas2' => ['required', 'exists:gurus,id'],
        ]);

        $beritaAcara->update([
            'pengawas1_id' => $request->pengawas1,
            'pengawas2_id' => $request->pengawas2,
        ]);

        $beritaAcara->load('pengawas1');
        $beritaAcara->load('pengawas2');

        return new BeritaAcaraResource($beritaAcara);
    }
}
