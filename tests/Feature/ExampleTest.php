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
        // Tinuro natin dito yung tamang link na ginawa mo
        $response = $this->get('/invitation');

        // Iche-check nito kung 200 (OK at nag-load ang HTML mo)
        $response->assertStatus(200);
    }
}