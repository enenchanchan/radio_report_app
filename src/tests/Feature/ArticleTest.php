<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Article;
use App\Models\User;

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

        $this->data = ([
            'user_id' => $this->article->user_id,
            'radio_id' => $this->article->radio_id,
            'radio_date' => $this->article->radio_date,
            'body' => $this->article->body,
            'link' => $this->article->link,
        ]);
    }


    public function test_index()
    {
        $response = $this->actingAs($this->user)
            ->get('/articles');
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
        $response->assertRedirect('/articles');
        $this->assertDatabaseHas('articles', [
            'user_id' => $this->article->user_id,
            'radio_id' => $this->article->radio_id,
            'radio_date' => $this->article->radio_date,
            'body' => $this->article->body,
            'link' => $this->article->link,
        ]);
    }

    public function test_edit()
    {
        $response = $this->actingAs($this->article->user)
            ->from('/articles/' . $this->article->id)
            ->get('/articles/' . $this->article->id . '/edit');
        $response->assertStatus(200)
            ->assertViewHas('radios');
    }

    public function test_update()
    {
        $response = $this->actingAs($this->article->user)
            ->from('/articles/' . $this->article->id . '/edit')
            ->put(
                '/articles/' . $this->article->id,
                [
                    'body' => 'aaa',
                ]
            );
        $response->assertRedirect('/articles');
        $this->assertDatabaseHas('articles', [
            'body' => 'aaa',
        ]);
    }

    public function test_destroy()
    {
        $response = $this->actingAs($this->article->user)
            ->delete('/articles/' . $this->article->id);
        $response->assertRedirect('/articles');
        $this->assertDatabaseMissing('articles', $this->data)
            ->assertEquals(0, Article::count());
    }
}
