<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->email,
            'message' => $this->faker->paragraph(20),
        ];
    }
}
