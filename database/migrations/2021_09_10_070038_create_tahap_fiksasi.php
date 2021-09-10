<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapFiksasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahap_fiksasi', function (Blueprint $table) {
            $table->id();
            $table->string('meet_pelaporan_jadwal');
            $table->string('meet_pelaporan_link');
            $table->string('tarif_sisa');
            $table->string('pembayaran_sisa_bukti');
            $table->bigInteger('id_tahap_pembayaran');
            $table->foreign('id_tahap_pembayaran')->references('id')->on('tahap_pembayaran');
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
        Schema::dropIfExists('tahap_fiksasi');
    }
}
