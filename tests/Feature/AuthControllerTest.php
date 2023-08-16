<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function test_user_registered_can_login_with_success()
    {
        $user = [
            'email' => 'pablo@example.com',
            'password' => 'Abc123456789.'
        ];

        $this->json('POST', 'api/login', $user)
            ->assertStatus(200)
            ->assertJsonStructure([
                "success",
                "message",
                "data" => [
                    "token"
                ]
            ]);
    }
    
    public function test_user_not_registered_can_not_login_with_success()
    {
        $user = [
            'email' => 'juan@example.com',
            'password' => 'Abc123456789.'
        ];

        $this->json('POST', 'api/login', $user)
            ->assertStatus(401);
    }

    public function test_register_with_success()
    {
        $user = [
            'name' => 'monica',
            'email' => 'monica@example.com',
            'password' => '1234567890'
        ];

        $this->json('POST', 'api/register', $user)
            ->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                    'data' => [
                        "token"
                    ]
            ]);
    }

    public function test_register_with_invalid_user_data()
    {
        $user = [
            'name' => '',
            'email' => '',
            'password' => ''
        ];

        $this->json('POST', 'api/register', $user)
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                  "name" => [
                    "El nombre de usuario es obligatorio"
                  ],
                  "email" => [
                    "El email es obligatorio"
                  ],
                  "password" => [
                    "La contraseña es obligatoria"
                  ]
                ]
            ]);
    }
    
}
