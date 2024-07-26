<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'nom' => fake()->name(7),
          'prenom' => fake()->name(7),
          'email' => fake()->unique()->safeEmail(),
          'password' => '$2ydjjkelkerfl',
        ];
    }
}
