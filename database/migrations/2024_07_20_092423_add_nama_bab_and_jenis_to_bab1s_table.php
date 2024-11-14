<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bab1s', function (Blueprint $table) {
            $table->string('nama_bab')->after('id'); // Add the 'nama_bab' column
            // $table->foreignId('jenis_id')->constrained()->after('nama_bab'); // Add the 'jenis_id' column as a foreign key
            // $table->unsignedBigInteger('jenis_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bab1s', function (Blueprint $table) {
            // $table->dropForeign(['jenis_id']); // Drop foreign /key constraint
            $table->dropColumn(['nama_bab']); // Drop the columns
        });
    }
};
