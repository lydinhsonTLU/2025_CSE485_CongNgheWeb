<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab1-PC' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'model' => $faker->randomElement([
                    'Dell Optiplex 7090',
                    'HP ProDesk 400',
                    'Lenovo ThinkCentre M720'
                ]),
                'operating_system' => $faker->randomElement([
                    'Windows 10 Pro',
                    'Windows 11 Pro',
                    'Ubuntu 22.04'
                ]),
                'processor' => $faker->randomElement([
                    'Intel Core i5-11400',
                    'Intel Core i7-10700',
                    'AMD Ryzen 5 5600G'
                ]),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(80), // 80% đang hoạt động
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
