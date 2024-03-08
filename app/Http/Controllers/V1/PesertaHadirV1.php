<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaAcaraResource;
use App\Http\Resources\PesertaHadirResource;
use App\Models\BeritaAcara;
use App\Models\PesertaHadir;
use Illuminate\Http\Request;

class PesertaHadirV1 extends Controller
{
    public function index(BeritaAcara $beritaAcara)
    {
        $pesertaHadir = PesertaHadir::where('berita_acara_id', $beritaAcara->id)->orderBy('nama')->get();

        $beritaAcara->load('ruang');

        return response()->json([
            'berita_acara' => new BeritaAcaraResource($beritaAcara),
            'peserta_hadir' => PesertaHadirResource::collection($pesertaHadir)
        ]);
    }

    public function store(Request $request, BeritaAcara $beritaAcara)
    {

        $request->validate([
            'nama' => 'required|max:250'
        ]);

        $pesertaHadir = PesertaHadir::create([
            'berita_acara_id' => $beritaAcara->id,
            'nama' => $request->nama
        ]);

        return response()->json([
            'message'=>'successfully'
        ]);
    }

    public function destroy(BeritaAcara $beritaAcara, PesertaHadir $pesertaHadir)
    {

        $pesertaHadir->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ]);
    }
}
