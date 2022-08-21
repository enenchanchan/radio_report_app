<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Article;
use App\Models\User;
use App\Models\Radio;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->article = Article::factory()->create();

        $this->user = User::factory()->create();

        $this->radio = Radio::factory()->create();

        $this->data = [];
    }


    public function test_index()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->user)
            ->get('/articles/create');
        $response->assertStatus(200)
            ->assertViewHas('radios');
    }

    public function test_store()
    {
        $response = $this->actingAs($this->user)
            ->post('/articles', $this->data);
        $response->assertRedirect('/');
    }

    public function test_edit()
    {
        $response = $this->actingAs($this->article->user)
            ->get('/articles/' . $this->article->id . '/edit');
        $response->assertStatus(200)
            ->assertViewHas('radios');
    }

    public function test_update()
    {
        $response = $this->actingAs($this->article->user)
            ->put('/articles/' . $this->article->id);
        $response->assertRedirect('/');
    }

    public function test_destroy()
    {
        $response = $this->actingAs($this->article->user)
            ->from(route('articles.index'))
            ->delete('/articles/' . $this->article->id);
        $response->assertRedirect('/');
    }
}
