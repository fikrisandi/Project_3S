<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use App\Models\PekerjaanPembayaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanPembayaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PekerjaanPembayaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pembayaran_total' => $this->faker->numberBetween(600000, 100000),
            'pembayaran_dp' => $this->faker->numberBetween(600000, 100000),
            'pembayaran_dp_bukti' => $this->faker->url(),
            'pembayaran_sisa' => $this->faker->numberBetween(600000, 100000),
            'pembayaran_sisa_bukti'  => $this->faker->url(),
            'pekerjaan_id' => Pekerjaan::all()->random()->id
        ];
    }
}
