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
        Schema::create('bab5s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bab');
            $table->foreignId('jenis_id')
                ->constrained('jenis')
                ->onDelete('cascade');
            $table->foreignId('tahun_id')
                ->constrained('tahun_dokumen')
                ->onDelete('cascade');
            $table->string('kode_opd');
            // $table->json('tujuan_opd')->nullable();
            // $table->json('sasaran_opd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bab5s');
    }
};
