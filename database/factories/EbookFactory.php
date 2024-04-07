<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ebook>
 */
class EbookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 
        // $table->string('path');
        // $table->string('type');
        return [
           'book_id' => Book::inRandomOrder()->first(), 
           'path' => $this->faker->imageUrl($width = 640, $height = 480),
           'type' => $this->faker->word(),
        ];
    }
}
