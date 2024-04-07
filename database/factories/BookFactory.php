<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first(),
            'cover_path' => $this->faker->imageUrl($width = 640, $height = 480),
            'title' => $this->faker->sentence(),
            'status' => $this->faker->word(),
            'description' => $this->faker->text($maxNbChars = 200),
            'author'=> $this->faker->name(),
            'quantity' =>random_int(10,1000),
        ];
    }
}
