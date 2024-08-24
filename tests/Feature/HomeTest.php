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

    /** @test */
    public function it_passes_the_correct_data_to_the_view()
    {
        // Create test data
        $teacher = Teacher::factory()->create();
        $about = About::factory()->create();
        $carousel = Carousel::factory()->create();
        $articles = Article::factory()->createMany(4);
        $categories = Category::factory()->createMany(3);

        // Render the component
        $component = $this->livewire('home-component');

        // Assert that the correct data is passed to the view
        $this->assertEquals($teacher->toArray(), $component->teachers[0]->toArray());
        $this->assertEquals($about->toArray(), $component->about->toArray());
        $this->assertCount(1, $component->carousel);
        $this->assertCount(4, $component->articles);
        $this->assertCount(3, $component->categories);
    }
}
