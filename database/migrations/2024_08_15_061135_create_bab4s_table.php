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
        Schema::create('bab4s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bab');
            $table->foreignId('jenis_id')->constrained()->onDelete('cascade');
            $table->string('kode_opd');
            $table->foreignId('tahun_id')->constrained('tahun_dokumen')->onDelete('cascade');
            $table->string('tujuan_opd')->nullable();
            $table->string('indikator_opd')->nullable();
            $table->string('sasaran_opd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bab4s');
    }
};
