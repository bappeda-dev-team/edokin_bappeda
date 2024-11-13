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
            $table->text('uraian1')->after('id')->nullable();
            $table->text('uraian2')->after('uraian1')->nullable();
            $table->text('uraian3')->after('uraian2')->nullable();
            $table->text('uraian4')->after('uraian3')->nullable();
            $table->text('uraian5')->after('uraian4')->nullable();
            $table->json('isu_strategis')->after('uraian5')->nullable();
            // $table->text('isu_strategis1')->after('uraian5')->nullable();
            // $table->text('isu_strategis2')->after('isu_strategis1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bab3s', function (Blueprint $table) {
            $table->dropColumn([
                'uraian1',
                'uraian2',
                'uraian3',
                'uraian4',
                'uraian5',
                'isu_strategis1',
                'isu_strategis2',
            ]);
        });
    }
};
