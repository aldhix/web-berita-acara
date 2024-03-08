<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use App\Models\PesertaAbsen;
use App\Models\PesertaHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ToolsController extends Controller
{
    public function clear(Request $request) {
        
        Schema::disableForeignKeyConstraints();
        PesertaHadir::truncate();
        PesertaAbsen::truncate();
        BeritaAcara::truncate();
        Schema::enableForeignKeyConstraints();
        
        return back()->with('status','delete');
    }
}
