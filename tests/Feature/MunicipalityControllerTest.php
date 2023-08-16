<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MunicipalityControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_municipality_with_wrong_id_province_must_return_empty_array()
    {
        Sanctum::actingAs(User::factory()->create());
        $idProvince = 500;

        $this->json('GET','api/municipalities/' . $idProvince)
            ->assertStatus(200)
            ->assertJson([]);
    }
}
