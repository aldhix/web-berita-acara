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
        Schema::create('peserta_hadirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('berita_acara_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_hadirs');
    }
};
