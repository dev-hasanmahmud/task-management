<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserRegisterAPITest extends TestCase
{
    /**
     * Test successful user registration.
     *
     * @return void
     */
    public function test_user_registration_success()
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Korim1',
            'email' => 'korim1@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(201)
                 ->assertJson([
                     'name' => 'Korim1',
                     'email' => 'korim1@example.com',
                 ]);
    }
}
