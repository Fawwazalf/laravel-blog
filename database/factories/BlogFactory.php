<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(6),
            'content' => $this->faker->paragraphs(3, true),
            'featured_image' => $this->faker->imageUrl(),
            'gallery_images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
