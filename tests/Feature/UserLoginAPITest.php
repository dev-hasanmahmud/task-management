<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserLoginAPITest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test successful login.
     *
     * @return void
     */
    public function test_successful_login()
    {
        // Create a user with known credentials
        $user = User::factory()->create([
            'email' => 'korim1@example.com',
            'password' => bcrypt('password123'), // Make sure the password matches
        ]);

        // Attempt to login with correct credentials
        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'korim1@example.com',
            'password' => 'password123',
        ]);

        // Assert the response contains a token and the correct status code
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'access_token',
                     'token_type',
                     'expires_in',
                 ]);
    }

    /**
     * Test failed login due to invalid credentials.
     *
     * @return void
     */
    public function test_failed_login()
    {
        // Attempt to login with incorrect credentials
        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'nonexistent@example.com',
            'password' => 'wrongpassword',
        ]);

        // Assert the response contains the error message and the correct status code
        $response->assertStatus(401)
                 ->assertJson([
                     'error' => 'Something went Wrong!',
                 ]);
    }
}
