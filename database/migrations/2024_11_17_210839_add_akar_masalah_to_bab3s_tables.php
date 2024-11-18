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
        Schema::table('bab3s', function (Blueprint $table) {
            $table->json('akar_masalah')->nullable()->after('isu_strategis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab3s', function (Blueprint $table) {
            //
        });
    }
};
