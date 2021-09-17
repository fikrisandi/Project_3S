<?php

namespace Database\Factories;

use App\Models\PekerjaanStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PekerjaanStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['state_1', 'state_2', 'state_3'])
        ];
    }
}
