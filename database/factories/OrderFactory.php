<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $table->foreignId('book_id')->references('id')->on('books')->onDelete('cascade');
        // $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        // $table->timestamp('date_take');
        // $table->timestamp('date_back');
        // $table->string('status');
        return [
            'book_id' => Book::inRandomOrder()->first(), 
            'user_id' => User::inRandomOrder()->first(),
            'date_take' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            'date_back' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+10 years', $timezone = null),
            'status' => $this->faker->word(),
        ];
    }
}
