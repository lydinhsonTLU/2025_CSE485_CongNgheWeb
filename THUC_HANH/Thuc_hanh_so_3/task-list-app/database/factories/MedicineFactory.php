<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $forms = ['Viên nén', 'Viên nang', 'Xi-rô', 'Thuốc tiêm', 'Viên sủi'];

        return [
            'name' => $this->faker->words(2, true),
            'brand' => $this->faker->company(),
            'dosage' => $this->faker->randomElement(['250mg', '500mg', '100mg', '10mg tablets']),
            'form' => $this->faker->randomElement($forms),
            'price' => $this->faker->randomFloat(2, 1000, 50000),
            'stock' => $this->faker->numberBetween(10, 500),
        ];
    }
}
