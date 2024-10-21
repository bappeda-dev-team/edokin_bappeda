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
        Schema::table('bab5s', function (Blueprint $table) {
            $table->text('tujuan_opd')->nullable()->after('kode_opd');
            $table->text('sasaran_opd')->nullable()->after('tujuan_opd');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab5s', function (Blueprint $table) {
            //
        });
    }
};
