<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role');
            $table->string('no_telfon',20);
            $table->string('kota_domisili',25);
            $table->string('tempat_lahir',25);
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->string('pendidikan_terakhir',25);
            $table->string('profesi',25);
            $table->string('nama_perusahan',25);
            $table->string('foto_ktp',100);
            $table->string('NIK',25);
            $table->rememberToken();
            $table->timestamps();
        });
    }
/* 
    - email (String)
    - nama	(String)
    - password (String)
    - role (Int) -> (0 = Admin, 1 = Moderator, 2 = User)
    - no_telepon (String)
    - kota_domisili (String)
    - tempat_lahir (String)
    - tanggal_lahir (String)
    - jenis_kelamin (Boolean)
    - pendidikan_terakhir (String)
    - profesi (String)
    - nama_perusahaan (String)
    - foto_ktp (String) -> (Link)
    - NIK (String) */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
