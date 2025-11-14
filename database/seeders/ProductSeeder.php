<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public array $categories_IDs = [
        8, 9, 10, 11, 12, 13, 14, 15, 16, 17,
        18, 19, 20, 21, 22, 23, 24, 25, 26, 27,
        28, 29, 30, 31, 32, 33, 34, 35, 36, 37,
        38, 39,
    ];
    public array $seller_IDs = [1, 2, 3, 4, 5];
    public array $bg = ['brown', 'blue', 'green', 'red', 'yellow'];

    public function generateImageUrl($width, $height, $bg, $color, $text): string
    {
        return "https://placehold.co/{$width}x{$height}/{$bg}/{$color}?text=" . urlencode($text);
    }

    public function run(): void
    {
        $products = [];
        for ($i = 1; $i <= 50; $i++) {
            $name = "Sample Product {$i}";
            $products[] = [
                'seller_id' => $this->seller_IDs[array_rand($this->seller_IDs)],
                'category_id' => $this->categories_IDs[array_rand($this->categories_IDs)],
                'store_id' => 1,
                'name' => $name,
                'slug' => Str::slug($name) . '-' . $i,
                'description' => "Description for {$name}",
                'price' => 1000 + ($i * 100),
                'discount' => $i % 3 === 0 ? 100 : 0,
                'tax_rate' => 15,
                'visibility' => 1,
                'meta_title' => $name . ' | Vendora',
                'meta_description' => "Meta description for {$name}",
                'stock_status' => 1,
                'stock' => 50 + $i,
                'main_image' => $this->generateImageUrl(300, 300, 'brown', 'FFF', $name),
                'gallery' => [
                    $this->generateImageUrl(300, 300, $this->bg[array_rand($this->bg)], 'FFF', $name . $i),
                    $this->generateImageUrl(300, 300, $this->bg[array_rand($this->bg)], 'FFF', $name . $i),
                    $this->generateImageUrl(300, 300, $this->bg[array_rand($this->bg)], 'FFF', $name . $i),
                ],
                'status' => 1,
            ];
        }

        // Insert all at once
        foreach ($products as $productData) {
            Product::create($productData);
        }
    }

}
