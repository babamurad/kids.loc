<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_articles_page(): void
    {
        $response = $this->get('/articles');

        $response->assertStatus(200);
    }

    public function test_lessons_page(): void
    {
        $response = $this->get('/lessons');

        $response->assertStatus(200);
    }

    public function test_about_us_page(): void
        {
            $response = $this->get('/about-us');

            $response->assertStatus(200);
        }

    /** @test */
    public function it_renders_the_component()
    {
        $this->livewire('home-component')->assertViewIs('livewire.home-component');
    }

}
