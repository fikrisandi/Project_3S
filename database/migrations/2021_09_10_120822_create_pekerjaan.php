<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pekerjaan');
            $table->string('file_rab');
            $table->string('file_tor_sw');
            $table->string('file_laporan');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('pekerjaan_kategori');
            $table->bigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('pekerjaan_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaan');
    }
}
