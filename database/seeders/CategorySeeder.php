<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create an array to store parent category IDs
        $parentCategoryIds = [];

        // Generate parent categories and store their IDs
        foreach (range(1, 5) as $index) {
            $parentCategoryIds[] = DB::table('categories')->insertGetId([
                'name' => $faker->unique()->word,
                'description' => $faker->sentence,
                'icon_url' => $faker->imageUrl(),
                'background_image_url' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed data for child categories
        foreach (range(1, 20) as $index) {
            DB::table('categories')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'icon_url' => $faker->imageUrl(),
                'background_image_url' => $faker->imageUrl(),
                'parent_id' => $faker->randomElement($parentCategoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}