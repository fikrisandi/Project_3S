<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanMeet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_meet', function (Blueprint $table) {
            $table->id();
            $table->date('meet_pengajuan_jadwal');
            $table->string('meet_pengajuan_link');
            $table->date('meet_pelaporan_jadwal');
            $table->string('meet_pelaporan_link');
            $table->bigInteger('pekerjaan_id')->nullable();
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan');
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
        Schema::dropIfExists('pekerjaan_meet');
    }
}
