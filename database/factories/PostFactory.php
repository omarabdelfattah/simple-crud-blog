<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'title' => fake()->text(15),
            'body' => fake()->paragraph(),
            'enabled' =>fake()->boolean(), 
            'published_at' => fake()->dateTime(), 
            'user_id' => \App\Models\User::all()->random()->id,
        ];
    }
  
}
