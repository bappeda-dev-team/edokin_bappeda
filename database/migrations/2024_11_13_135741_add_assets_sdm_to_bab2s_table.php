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
            $table->json('asets_data')->nullable()->after('tahun_id');
            $table->json('sdm_data')->nullable()->after('asets_data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab2s', function (Blueprint $table) {
            //
        });
    }
};
