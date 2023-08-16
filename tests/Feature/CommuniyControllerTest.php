<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CommuniyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_communities_endpoint_response_with_success()
    {
        Sanctum::actingAs(User::factory()->create());
        
        $response = $this->get('/api/communities');

        $response->assertStatus(200);
    }
}
