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
            // $table->string('kode_bidang_urusan')->default('default_value')->after('id');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab1s', function (Blueprint $table) {
            //
            $table->dropColumn('kode_bidang_urusan');
        });
    }
};
