<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Radio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
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
    }

    public function test_show()
    {
        $response = $this->get('/users/' . $this->user->id);
        $response->assertStatus(200)
            ->assertViewHas('articles');
    }


    public function test_edit()
    {
        $response = $this->actingAs($this->user)
            ->get('/users/' . $this->user->id);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $response = $this->actingAs($this->user)
            ->put('/users/' . $this->user->id);
        $response->assertRedirect('/users/' . $this->user->id);
    }

    public function test_favorite()
    {
        $response = $this->get('/users/' . $this->user->id . '/favorites');
        $response->assertStatus(200)
            ->assertViewHas('radios');
    }
}
