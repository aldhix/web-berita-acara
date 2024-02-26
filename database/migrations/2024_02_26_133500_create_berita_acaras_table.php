<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita_acaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('ruang_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('pengawas1_id')->nullable()->constrained('gurus','id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId('pengawas2_id')->nullable()->constrained('gurus','id')->nullOnDelete()->cascadeOnUpdate();
            $table->string('kelas');
            $table->string('catatan')->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_acaras');
    }
};
