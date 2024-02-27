<?php

use App\Http\Controllers\ListController;
use App\Http\Controllers\V1\BeritaAcaraV1;
use Illuminate\Support\Facades\Route;

Route::prefix('list')->group(function () {
  Route::get('pengawas', [ListController::class, 'pengawas']);
  Route::get('jadwal', [ListController::class, 'jadwal']);
  Route::get('ruang', [ListController::class, 'ruang']);
});

Route::get('berita_acara/jadwal/{jadwal}/ruang/{ruang}',[BeritaAcaraV1::class,'show']);