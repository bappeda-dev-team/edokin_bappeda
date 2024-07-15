<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBab1sTable extends Migration
{
    public function up()
    {
        Schema::create('bab1s', function (Blueprint $table) {
            $table->id();
            $table->text('latar_belakang');
            $table->text('dasar_hukum');
            $table->text('maksud_tujuan');
            $table->text('sistematika_penulisan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bab1s');
    }
}
