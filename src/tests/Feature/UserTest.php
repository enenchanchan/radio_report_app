<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
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

        $this->user = User::factory()->create();
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
            ->from('/users/' . $this->user->id)
            ->get('/users/' . $this->user->id);
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $response = $this->actingAs($this->user)
            ->put('/users/' . $this->user->id, [
                'name' => 'taro',
                'prefecture_id' => 1,
            ]);
        $response->assertRedirect('/users/' . $this->user->id);
        $this->assertDatabaseHas('users', [
            'name' => 'taro',
            'prefecture_id' => 1,
        ]);
    }

    public function test_favorite()
    {
        $response = $this->from('/users/' . $this->user->id)
            ->get('/users/' . $this->user->id . '/favorites');
        $response->assertStatus(200)
            ->assertViewHas('radios');
    }

    public function test_image_update()
    {
        $image = UploadedFile::fake()
            ->image('hogehoge.png');

        $response = $this->actingAs($this->user)
            ->from('/users/' . $this->user->id)
            ->put('/users/' . $this->user->id, [
                'name' => 'taro',
                'prefecture_id' => 1,
                'image' => $image,
            ]);
        $response->assertRedirect('/users/' . $this->user->id);
        $this->assertDatabaseHas('users', [
            'image' => 'hogehoge.png',
        ]);
    }
}
