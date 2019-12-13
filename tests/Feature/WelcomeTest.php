<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testWelcome()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertSeeText('Laravel Test Repo');
    }
}
