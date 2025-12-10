<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sales>
 */
class SalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medicine_id' => Medicine::inRandomOrder()->first()->medicine_id ?? Medicine::factory(),
            'quantity' => $this->faker->numberBetween(1, 20),
            'sale_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'customer_phone' => $this->faker->optional()->numerify('0#########'),
        ];
    }
}
