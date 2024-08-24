<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeachersTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_teachers_page(): void
    {
        $response = $this->get('/teachers');

        $response->assertStatus(200);
    }
}
