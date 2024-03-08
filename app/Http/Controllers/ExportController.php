<?php

namespace App\Http\Controllers;

use App\Exports\DaftarAbsenExport;
use App\Exports\DaftarHadirExport;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function daftarHadir(Jadwal $jadwal) {
        $filename = strtolower($jadwal->nama_mapel);
        $filename = str_replace(" ","-",$filename);
        return Excel::download(new DaftarHadirExport($jadwal->id), 'daftar-hadir-'.$filename.'.xlsx');
    }

    public function daftarAbsen(Jadwal $jadwal) {
        $filename = strtolower($jadwal->nama_mapel);
        $filename = str_replace(" ","-",$filename);
        return Excel::download(new DaftarAbsenExport($jadwal->id), 'berita-acara-'.$filename.'.xlsx');
    }
}
