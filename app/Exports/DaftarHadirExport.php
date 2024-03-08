<?php

namespace App\Exports;

use App\Models\PesertaHadir;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DaftarHadirExport implements FromView
{
    private $jadwal_id;

    function __construct($jadwal_id)
    {
        $this->jadwal_id = $jadwal_id;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.daftar-hadir', [
            'peserta' => PesertaHadir::join('berita_acaras', 'berita_acaras.id', 'peserta_hadirs.berita_acara_id')
                ->join('jadwals', 'jadwals.id', 'berita_acaras.jadwal_id')
                ->select('peserta_hadirs.*')
                ->where('jadwal_id', $this->jadwal_id)
                ->get()
        ]);
    }
}
