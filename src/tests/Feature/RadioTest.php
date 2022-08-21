<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Radio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RadioTest extends TestCase
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

        $this->data = [
            'radio_title' => $this->radio->radio_title,
            'radio_date' => '月曜日',
            'start_time' => $this->radio->start_time,
            'broadcaster' => $this->radio->broadcaster,
        ];
    }

    public function test_index()
    {
        $response = $this->get('/radios');
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->actingAs($this->user)
            ->get('/radios/create');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $response = $this->actingAs($this->user)
            ->post('/radios', $this->data);
        $response->assertRedirect('/radios');
    }


    public function test_show()
    {
        $response = $this->get('/radios/' . $this->radio->id);
        $response->assertStatus(200)
            ->assertViewHas('articles');
    }

    public function test_edit()
    {
        $response = $this->get('/radios/' . $this->radio->id . '/edit');
        $response->assertStatus(302);
    }

    public function test_update()
    {
        $response = $this->actingAs($this->user)
            ->from('/radios/' . $this->radio->id)
            ->put('/radios/' . $this->radio->id);
        $response->assertRedirect('/radios/' . $this->radio->id);
    }

    public function test_destroy()
    {
        $response = $this->actingAs($this->user)
            ->delete('/radios/' . $this->article->id);
        $response->assertStatus(404);
    }
}
