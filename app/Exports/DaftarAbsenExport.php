<?php

namespace App\Exports;

use App\Models\PesertaAbsen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DaftarAbsenExport implements FromView
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
        return view('exports.daftar-absen', [
            'peserta' => PesertaAbsen::join('berita_acaras', 'berita_acaras.id', 'peserta_absens.berita_acara_id')
                ->join('jadwals', 'jadwals.id', 'berita_acaras.jadwal_id')
                ->select('peserta_absens.*')
                ->where('jadwal_id', $this->jadwal_id)
                ->get()
        ]);
    }
}
