<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\V1\BeritaAcaraV1;
use App\Http\Controllers\V1\PengawasV1;
use App\Http\Controllers\V1\PesertaAbsenV1;
use App\Http\Controllers\V1\PesertaHadirV1;
use Illuminate\Support\Facades\Route;

Route::prefix('list')->group(function () {
  Route::get('pengawas', [ListController::class, 'pengawas']);
  Route::get('jadwal', [ListController::class, 'jadwal']);
  Route::get('ruang', [ListController::class, 'ruang']);
});

Route::get('berita_acara/jadwal/{jadwal}/ruang/{ruang}', [BeritaAcaraV1::class, 'show']);
Route::post('berita_acara/{berita_acara}/catatan', [BeritaAcaraV1::class, 'catatan']);
Route::resource('berita_acara.peserta_hadir', PesertaHadirV1::class)->only('index', 'store', 'destroy');
Route::resource('berita_acara.peserta_absen', PesertaAbsenV1::class)->only('index', 'store', 'destroy');
Route::resource('berita_acara.pengawas', PengawasV1::class)->only('store');