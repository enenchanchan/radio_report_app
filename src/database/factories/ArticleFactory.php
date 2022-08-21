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
        $user = User::factory()->create();

        $radio = Radio::factory()->create();

        return [
            'user_id' => $user->id,
            'radio_id' => $radio->id,
            'radio_date' => $this->faker->date(),
            'body' => $this->faker->text(),
            'link' => $this->faker->url(),
        ];
    }
}
