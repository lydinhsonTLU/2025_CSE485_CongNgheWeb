<?php

namespace Database\Seeders;

use App\Models\Computers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Computers::factory()->count(10)->create();
    }
}
