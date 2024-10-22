<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bab3', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bab');
            $table->foreignId('jenis_id')->constrained()->onDelete('cascade');
            $table->string('kode_opd');
            $table->foreignId('tahun_id')->constrained('tahun_dokumen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bab3s');
    }
};
