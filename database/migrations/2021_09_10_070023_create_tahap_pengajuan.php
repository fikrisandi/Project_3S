<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahap_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('meet_pengajuan_jadwal');
            $table->string('meet_pengajuan_link');
            $table->bigInteger('id_tahap_berkas');
            $table->foreign('id_tahap_berkas')->references('id')->on('tahap_berkas');
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
        Schema::dropIfExists('tahap_pengajuan');
    }
}
