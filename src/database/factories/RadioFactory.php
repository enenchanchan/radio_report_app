<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Radio>
 */
class RadioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'radio_title' => $this->faker->realtext(100),
            'radio_date' => '月曜日',
            'start_time' => $this->faker->time(),
            'broadcaster' => $this->faker->realtext(16),
            'radio_about' => $this->faker->realText(1000),
            'image' => $this->faker->image(),
        ];
    }
}
