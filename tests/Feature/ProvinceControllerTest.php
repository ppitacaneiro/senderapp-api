<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProvinceControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_provinces_with_community_id_must_return_collection()
    {
        Sanctum::actingAs(User::factory()->create());
        $id = 12;

        $response = $this->json('GET', 'api/provinces/' . $id)
            ->assertStatus(200)
            ->assertJson([
                [
                  "id" => 15,
                  "community_id" => 12,
                  "name" => "Coruña, A",
                  "created_at" => null,
                  "updated_at" => null
                ],
                [
                  "id" => 27,
                  "community_id" => 12,
                  "name" => "Lugo",
                  "created_at" => null,
                  "updated_at" => null
                ],
                [
                  "id" => 32,
                  "community_id" => 12,
                  "name" => "Ourense",
                  "created_at" => null,
                  "updated_at" => null
                ],
                [
                  "id" => 36,
                  "community_id" => 12,
                  "name" => "Pontevedra",
                  "created_at" => null,
                  "updated_at" => null
                ]
            ]);
    }
}
