<?php

namespace Database\Factories;

use App\Models\User;
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

    //  $table->text('titre')->nullable();
    //  $table->string('photo_path')->nullable();
    //  $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
    //  $table->longText('description')->nullable();;
    //  $table->string('type');

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(),
            'photo_path' => $this->faker->imageUrl($width = 640, $height = 480),
            'user_id' => User::inRandomOrder()->first(),
            'description' => $this->faker->text(),
            'type' => $this->faker->word(),
        ];
    }
}
