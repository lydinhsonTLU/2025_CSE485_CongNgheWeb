<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tasks>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->sentence(10),
            'long_description' => $this->faker->optional()->paragraph(3),
            'completed' => $this->faker->boolean(20), // 20% nhiệm vụ hoàn thành
        ];
    }
}
