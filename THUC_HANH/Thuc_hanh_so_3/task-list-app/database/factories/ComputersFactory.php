<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computers>
 */
class ComputersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'computer_name' => 'Lab1-PC' . $this->faker->numberBetween(1, 50),
            'model' => $this->faker->randomElement(['Dell Optiplex 7090', 'HP ProDesk 400', 'Lenovo ThinkCentre M720s']),
            'operating_system' => $this->faker->randomElement(['Windows 10 Pro', 'Windows 11 Pro']),
            'processor' => $this->faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-10700', 'AMD Ryzen 5 5600G']),
            'memory' => $this->faker->randomElement([8, 16, 32]),
            'available' => $this->faker->boolean(80), // 80% máy hoạt động
        ];
    }
}
