<?php

namespace Database\Seeders;

use App\Models\HickingTrail;
use Illuminate\Database\Seeder;
use App\Models\Step;
use App\Models\Photo;

class HickingTrailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HickingTrail::factory()
            ->has(Step::factory()->count(10))
            ->has(Photo::factory()->count(10))
            ->count(10)
            ->create();
    }
}
