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
            $table->text('nama_opd')->after('id')->nullable();
            $table->text('bidang_urusan')->after('nama_opd')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab1s', function (Blueprint $table) {
            //
        });
    }
};
