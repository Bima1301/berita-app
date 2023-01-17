<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'content' => $this->faker->text(),
            'user_id' => mt_rand(1,3),
            'category_id' => mt_rand(1,2)
        ];
    }
}
