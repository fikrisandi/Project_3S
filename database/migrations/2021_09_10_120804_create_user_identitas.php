<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIdentitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_identitas', function (Blueprint $table) {
            $table->id();
            $table->string('no_telfon'); // masih rancu
            $table->string('kota_domisili');
            $table->string('nama_ktp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin'); // masih rancu
            $table->string('pendidikan_terakhir');
            $table->string('profesi');
            $table->string('nama_perusahan');
            $table->string('foto_ktp');
            $table->string('nik'); // masih rancu
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_identitas');
    }
}
