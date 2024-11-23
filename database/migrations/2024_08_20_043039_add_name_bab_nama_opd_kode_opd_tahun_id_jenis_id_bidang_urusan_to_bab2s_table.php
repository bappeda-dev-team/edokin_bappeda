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
            // Add 'kode_opd' first
            $table->string('kode_opd')->after('id');
            
            // Then add 'nama_opd'
            $table->string('nama_opd')->after('kode_opd');
            
            // Add other columns
            $table->string('nama_bab')->after('kode_opd');
            $table->text('bidang_urusan')->nullable()->after('nama_opd');
            // $table->foreignId('jenis_id')->constrained()->after('nama_bab');
            $table->unsignedBigInteger('tahun_id')->nullable();
            // $table->unsignedBigInteger('jenis_id')->nullable();

            // Add foreign key constraint
            $table->foreign('tahun_id')->references('id')->on('tahun_dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab2s', function (Blueprint $table) {
            // Drop columns in the reverse order of addition
            // $table->dropForeign(['jenis_id']);
            $table->dropForeign(['tahun_id']);
            $table->dropColumn(['kode_opd', 'nama_opd', 'nama_bab', 'bidang_urusan', 'tahun_id']);
        });
    }
};
