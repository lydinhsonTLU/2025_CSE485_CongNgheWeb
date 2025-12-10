<?php

namespace Database\Factories;

use App\Models\Computers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issues>
 */
class IssuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_id' => Computers::factory(),
            'reported_by' => $this->faker->optional()->name(),
            'reported_date' => $this->faker->dateTimeBetween('-7 days', 'now'),
            'description' => $this->faker->sentence(10),
            'urgency' => $this->faker->randomElement(['Low', 'Medium', 'High']),
            'status' => $this->faker->randomElement(['Open', 'In Progress', 'Resolved']),
        ];
    }
}
