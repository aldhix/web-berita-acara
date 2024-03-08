<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function updateAktif(Request $request, Jadwal $jadwal){
        $jadwal->update([
            'aktif'=> $request->aktif == 1 ? 0 : 1
        ]);
        return back();
    }
}
