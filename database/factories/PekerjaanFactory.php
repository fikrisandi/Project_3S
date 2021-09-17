<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use App\Models\PekerjaanKategori;
use App\Models\PekerjaanStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pekerjaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pekerjaan' => $this->faker->jobTitle(),
            'file_rab' => $this->faker->word(),
            'file_tor_sw' => $this->faker->word(),
            'file_laporan' => $this->faker->word(),

            'user_id' => User::all()->random()->id,
            'kategori_id' => PekerjaanKategori::all()->random()->id,
            'status_id' => PekerjaanStatus::all()->random()->id
        ];
    }
}
/*
$this->faker->name
$this->faker->word
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
*/