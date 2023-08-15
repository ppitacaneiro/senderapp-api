<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommuniyControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommunitiesEndpointResponseWithSuccess()
    {
        $response = $this->get('/api/communities');

        $response->assertStatus(200);
    }
}
