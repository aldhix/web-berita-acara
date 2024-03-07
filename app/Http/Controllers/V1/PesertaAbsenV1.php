<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaAcaraResource;
use App\Http\Resources\PesertaAbsenResource;
use App\Models\BeritaAcara;
use App\Models\PesertaAbsen;
use Illuminate\Http\Request;

class PesertaAbsenV1 extends Controller
{
    public function index(BeritaAcara $beritaAcara)
    {
        $pesertaAbsen = PesertaAbsen::where('berita_acara_id', $beritaAcara->id)->orderBy('nama')->get();

        $beritaAcara->load('ruang');

        return response()->json([
            'berita_acara' => new BeritaAcaraResource($beritaAcara),
            'peserta_absen' => PesertaAbsenResource::collection($pesertaAbsen)
        ]);
    }

    public function store(Request $request, BeritaAcara $beritaAcara)
    {

        $request->validate([
            'nama' => 'required|max:150'
        ]);

        $pesertaAbsen = PesertaAbsen::create([
            'berita_acara_id' => $beritaAcara->id,
            'nama' => $request->nama
        ]);

        return response()->json([
            'message'=>'successfully'
        ]);
    }

    public function destroy(BeritaAcara $beritaAcara, PesertaAbsen $pesertaAbsen)
    {

        $pesertaAbsen->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
