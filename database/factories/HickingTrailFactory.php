<?php

namespace Database\Factories;

use App\Enums\DifficultyLevel;
use App\Models\Municipality;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class HickingTrailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomCommunityId = $this->faker->numberBetween(1,19);
        $randomProvinceId = Province::where('community_id', $randomCommunityId)->first()->id;
        $randomMunicipalityId = Municipality::where('province_id', $randomProvinceId)->first()->id;

        return [
            'user_id' => 1,
            'distance_kms' => $this->faker->randomNumber(2, false),
            'time_minutes' => $this->faker->randomNumber(3, false),
            'community_id' => $randomCommunityId,
            'province_id' =>  $randomProvinceId,
            'municipality_id' => $randomMunicipalityId,
            'origin_name' => $this->faker->word,
            'origin_lat' => $this-> faker->numberBetween(-90,90),
            'origin_lng' => $this-> faker->numberBetween(-180,180),
            'destination_name' => $this->faker->word,
            'destination_lat' => $this-> faker->numberBetween(-90,90),
            'destination_lng' => $this-> faker->numberBetween(-180,180),
            'difficulty_level' => $this->faker->randomElement(DifficultyLevel::class),
        ];
    }
}
