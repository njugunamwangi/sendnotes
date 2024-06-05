<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'uuid' => fake()->uuid(),
            'title' => fake()->name(),
            'body' => fake()->paragraph(),
            'send_date' => now()->addDay(),
            'user_id' => User::factory(),
        ];
    }
}
