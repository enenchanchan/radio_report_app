<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Radio;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->user = User::factory()->create();

        $this->radio = Radio::factory()->create();

        return [
            'user_id' => $this->user->id,
            'radio_id' => $this->radio->id,
            'radio_date' => $this->faker->date(),
            'body' => $this->faker->realText(),
            'link' => $this->faker->url(),
        ];
    }
}
