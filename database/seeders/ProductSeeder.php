<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Seed data for the "products" table
        foreach (range(1, 50) as $index) {
            DB::table('products')->insert([
                'title' => $faker->words(2, true),
                'category_id' => random_int(6,25),
                'price' => $faker->randomFloat(2, 10, 100),
                'sku' => $faker->unique()->regexify('[A-Z0-9]{10}'),
                'in_stock' => $faker->boolean(80), // 80% chance of being in stock
                'image_1_url' => $faker->imageUrl(),
                'image_2_url' => $faker->imageUrl(),
                'image_3_url' => $faker->imageUrl(),
                'image_4_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
