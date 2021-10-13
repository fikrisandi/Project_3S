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
            $table->decimal('pembayaran_total',10,2);
            $table->decimal('pembayaran_dp',10,2);
            $table->string('pembayaran_dp_bukti')->nullable();
            $table->decimal('pembayaran_sisa',10,2)->nullable();
            $table->string('pembayaran_sisa_bukti')->nullable();
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
        Schema::dropIfExists('pekerjaan_pembayaran');
    }
}
