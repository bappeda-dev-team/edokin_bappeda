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
        Schema::table('bab2s', function (Blueprint $table) {
            $table->text('uraian_mitra_pd')->nullable()->after('sdm_data');
            $table->text('uraian_dukungan_instansi')->nullable()->after('uraian_mitra_pd');
            $table->text('uraian_kerjasama_dengan_pemda_lain')->nullable()->after('uraian_dukungan_instansi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('babs2_tables', function (Blueprint $table) {
            //
        });
    }
};
