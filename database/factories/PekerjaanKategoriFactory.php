<?php

namespace Database\Factories;

use App\Models\PekerjaanKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanKategoriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PekerjaanKategori::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kategori' => $this->faker->company(),
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}
/*
$table->string('kategori');
$table->string('deskripsi');
*/