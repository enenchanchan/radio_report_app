<?php

namespace Tests\Feature;

use App\Models\Radio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
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

        $this->user = User::factory()->create();

        $this->radio = Radio::factory()->create();

        $this->data = [
            'radio_title' => $this->radio->radio_title,
            'radio_date' => $this->radio->radio_date,
            'start_time' => $this->radio->start_time,
            'broadcaster' => $this->radio->broadcaster,
            'radio_about' => $this->radio->radio_about,
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
            ->from('/radios/create')
            ->post('/radios', $this->data);
        $response->assertRedirect('/radios');
        $this->assertDatabaseHas('radios', [
            'radio_title' => $this->radio->radio_title,
            'radio_date' => $this->radio->radio_date,
            'start_time' => $this->radio->start_time,
            'broadcaster' => $this->radio->broadcaster,
            'radio_about' => $this->radio->radio_about,
            'image' => $this->radio->image,
        ]);
    }


    public function test_show()
    {
        $response = $this->get('/radios/' . $this->radio->id);
        $response->assertStatus(200)
            ->assertViewHas('articles');
    }

    public function test_edit()
    {
        $response = $this->actingAs($this->user)
            ->from('/radios/' . $this->radio->id)
            ->get('/radios/' . $this->radio->id . '/edit');
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $response = $this->actingAs($this->user)
            ->from('/radios/' . $this->radio->id)
            ->put('/radios/' . $this->radio->id, [
                'radio_title' => $this->radio->radio_title,
                'radio_date' => $this->radio->radio_date,
                'start_time' => $this->radio->start_time,
                'broadcaster' => 'テスト放送局',
                'radio_about' => 'テストアップデート',
            ]);
        $response->assertRedirect('/radios/' . $this->radio->id);
        $this->assertDatabaseHas('radios', [
            'broadcaster' => 'テスト放送局',
            'radio_about' => 'テストアップデート',
        ]);
    }

    public function test_destroy()
    {
        $response = $this->actingAs($this->user)
            ->delete('/radios/' . $this->radio->id);
        $response->assertRedirect('/radios');
        $this->assertDatabaseMissing('radios', $this->data)
            ->assertEquals(0, Radio::count());
    }

    public function test_image_store()
    {
        $image = HttpUploadedFile::fake()
            ->image('hoge.png');

        $response = $this->actingAs($this->user)
            ->post('/radios', [
                'radio_title' => $this->radio->radio_title,
                'radio_date' => $this->radio->radio_date,
                'start_time' => $this->radio->start_time,
                'broadcaster' => $this->radio->broadcaster,
                'radio_about' => $this->radio->radio_about,
                'image' => $image,
            ]);
        $response->assertRedirect('/radios');
        $this->assertDatabaseHas('radios', [
            'image' => 'hoge.png',
        ]);
    }

    public function test_image_update()
    {
        $image = HttpUploadedFile::fake()
            ->image('hogehoge.png');

        $response = $this->actingAs($this->user)
            ->from('/radios/' . $this->radio->id)
            ->put('/radios/' . $this->radio->id, [
                'radio_title' => $this->radio->radio_title,
                'radio_date' => $this->radio->radio_date,
                'start_time' => $this->radio->start_time,
                'broadcaster' => 'テスト放送局',
                'radio_about' => $this->radio->radio_about,
                'image' => $image,
            ]);
        $response->assertRedirect('/radios/' . $this->radio->id);
        $this->assertDatabaseHas('radios', [
            'broadcaster' => 'テスト放送局',
            'image' => 'hogehoge.png',
        ]);
    }
}
