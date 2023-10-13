<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ImportProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file_to_read = fopen('database/csv/products.csv', 'r');

        if ($file_to_read !== FALSE) {
            $count = 1;
            while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
                $this->command->info("{$count} :  {$data[2]}");
                $count++;
                if($data[0] == 'category'){
                    continue;
                }

                $parent_cat = Category::where('name', $data[0])->first();

                if(!$parent_cat){
                    $parent_cat = Category::create([
                        'name' => $data[0],
                        'parent_id' => null
                    ]);
                }

                if($data[1]){
                    $child_cat = Category::where('name', $data[1])->first();
                    if(!$child_cat){
                        $child_cat = Category::create([
                            'name' => $data[1],
                            'parent_id' => $parent_cat->id
                        ]);
                    }
                }

                if($data[2]){
                    $product = Product::where('title', $data[2])->first();

                    if(!$product){
                        $product = Product::create([
                            'title' => $data[2],
                            'category_id' => $data[1] ? $child_cat->id : $parent_cat->id,
                            'description' => '',
                            'short_description' => '',
                            'sku' => '',
                        ]);

                        Variant::create([
                            'product_id' => $product->id,
                            'name' => 'default',
                            'price' => 0.0
                        ]);

                        $this->command->info("{$count} :  ADDED");
                    }
                }
            }
            fclose($file_to_read);
        }
    }
}
