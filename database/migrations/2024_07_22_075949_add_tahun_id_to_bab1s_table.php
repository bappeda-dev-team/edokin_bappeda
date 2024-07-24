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
        Schema::table('bab1s', function (Blueprint $table) {
            $table->unsignedBigInteger('tahun_id')->nullable();

            // Add a foreign key constraint
            $table->foreign('tahun_id')->references('id')->on('tahun_dokumen')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bab1s', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
            $table->dropColumn('tahun_id');
        });
    }
};
