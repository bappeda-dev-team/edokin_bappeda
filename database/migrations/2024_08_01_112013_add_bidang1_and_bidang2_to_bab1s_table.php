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
            //
            $table->text('bidang1')->after('id')->nullable();
            $table->text('bidang2')->after('bidang1')->nullable(); 
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
