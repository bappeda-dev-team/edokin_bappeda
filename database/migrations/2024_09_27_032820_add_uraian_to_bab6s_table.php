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
        Schema::table('bab6s', function (Blueprint $table) {
            // Menambahkan kolom 'uraian' dan menjadikannya nullable
            $table->text('uraian')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab6s', function (Blueprint $table) {
            //
            $table->dropColumn('uraian');
        });
    }
};