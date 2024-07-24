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
            $table->string('kode_opd')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bab1s', function (Blueprint $table) {
            // Drop foreign key constraint and column 'jenis_id'
            
            // Drop column 'kode_opd'
            $table->dropColumn('kode_opd');
        });
    }
};
