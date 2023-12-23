<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testExample()
    {
        $response = $this->get('/api/profile');

        $response->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json')
            ->assertJson(null);
    }
}
