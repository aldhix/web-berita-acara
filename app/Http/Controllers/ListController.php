<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuruResource;
use App\Http\Resources\JadwalResource;
use App\Http\Resources\RuangResource;
use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Ruang;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function pengawas(Request $request)
    {
        $guru = Guru::orderBy('nama')->get();
        return GuruResource::collection($guru);
    }

    public function jadwal(Request $request)
    {
        $jadwal = Jadwal::orderBy('id')->get();
        return JadwalResource::collection($jadwal);
    }

    public function ruang(Request $request)
    {
        $ruang = Ruang::orderBy('id')->get();
        return RuangResource::collection($ruang);
    }
}
