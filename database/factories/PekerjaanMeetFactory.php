<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use App\Models\PekerjaanMeet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanMeetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PekerjaanMeet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meet_pengajuan_jadwal' => $this->faker->date(),
            'meet_pengajuan_link' => $this->faker->url(),
            'meet_pelaporan_jadwal' => $this->faker->date(),
            'meet_pelaporan_link' => $this->faker->url(),
            'pekerjaan_id' => Pekerjaan::all()->random()->id
        ];
    }
}
//$table->date('meet_pengajuan_jadwal');
//$table->string('meet_pengajuan_link');
//$table->date('meet_pelaporan_jadwal');
//$table->string('meet_pelaporan_link');