<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::orderBy('id')->get();
        
        return Inertia::render('Dashboard', [
            'jadwals' => $jadwals,
            'linkDownloadDaftarHadir'=>route('export.daftar_hadir',['jadwal'=>':jadwal']),
            'linkDownloadBeritaAcara'=>route('export.berita_acara',['jadwal'=>':jadwal']),
            'linkUpdateAktif'=>route('jadwal.update.aktif',['jadwal'=>':jadwal'])
        ]);
    }
}
