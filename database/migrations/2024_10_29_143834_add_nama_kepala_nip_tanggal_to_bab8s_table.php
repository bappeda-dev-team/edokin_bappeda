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
        Schema::table('bab8s', function (Blueprint $table) {
            $table->string('nama_kepala_opd')->nullable()->after('kode_opd');
            $table->string('nip_kepala_opd')->nullable()->after('nama_kepala_opd');
            $table->date('tanggal')->nullable()->after('nip_kepala_opd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab8s', function (Blueprint $table) {
            //
        });
    }
};
