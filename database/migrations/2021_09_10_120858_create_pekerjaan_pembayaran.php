<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('pembayaran_total');
            $table->string('pembayaran_dp');
            $table->string('pembayaran_dp_bukti');
            $table->string('pembayaran_sisa');
            $table->string('pembayaran_sisa_bukti');
            $table->bigInteger('pekerjaan_id');
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
        Schema::dropIfExists('pekerjaan_pembayaran');
    }
}
