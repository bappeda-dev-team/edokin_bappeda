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
            $table->text('tugas_fungsi')->nullable()->after('id');
            $table->text('uraian_asets')->nullable()->after('tugas_fungsi');
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
