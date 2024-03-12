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
            $product_id = DB::table('products')->insertGetId([
                'title' => $faker->words(2, true),
                'description' => $faker->paragraph(4,true),
                'short_description' => $faker->paragraph(2,false),
                'category_id' => random_int(6,25),
                'sku' => $faker->unique()->regexify('[A-Z0-9]{10}'),
                'in_stock' => $faker->boolean(80), // 80% chance of being in stock
                'image_1_url' => $faker->imageUrl(),
                'image_2_url' => $faker->imageUrl(),
                'image_3_url' => $faker->imageUrl(),
                'image_4_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach(range(1, $faker->numberBetween(1, 3)) as $i){
                DB::table('variants')->insert([
                    'product_id' => $product_id,
                    'name' => $faker->words(2, true),
                    'price' => $faker->randomFloat(2, 10, 100),
                ]);
            }
        }
    }
}
