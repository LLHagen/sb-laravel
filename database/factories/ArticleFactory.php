<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'preview' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'description' => $this->faker->paragraph(50),
            'published' => $this->faker->boolean(),
        ];
    }
}
