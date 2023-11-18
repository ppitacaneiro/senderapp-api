<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lat' => $this-> faker->numberBetween(-90,90),
            'lng' => $this-> faker->numberBetween(-180,180),
        ];
    }
}
