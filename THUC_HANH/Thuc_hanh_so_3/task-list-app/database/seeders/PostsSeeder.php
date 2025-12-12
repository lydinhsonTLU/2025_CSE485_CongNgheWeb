<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('posts')->insert([
                'title' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
