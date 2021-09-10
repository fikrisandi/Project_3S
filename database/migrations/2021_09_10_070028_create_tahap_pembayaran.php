<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahapPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahap_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('pembayaran_total');
            $table->string('pembayaran_dp');
            $table->string('pembayaran_dp_bukti');
            $table->bigInteger('id_tahap_pengajuan');
            $table->foreign('id_tahap_pengajuan')->references('id')->on('tahap_pengajuan');
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
        Schema::dropIfExists('tahap_pembayaran');
    }
}
