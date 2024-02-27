<?php

use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;

Route::prefix('list')->group(function () {
  Route::get('pengawas', [ListController::class, 'pengawas']);
  Route::get('jadwal', [ListController::class, 'jadwal']);
  Route::get('ruang', [ListController::class, 'ruang']);
});
