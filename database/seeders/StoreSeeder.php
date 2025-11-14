<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sellers = [1, 2, 3, 4, 5];

        foreach ($sellers as $seller_id) {
            for ($i = 1; $i <= 3; $i++) {
                $storeName = "Seller {$seller_id} Store {$i}";
                $slug = Str::slug($storeName);
                $gradientTo = match($i) {
                    1 => 'EE9CA7',
                    2 => 'FEC3A6',
                    3 => 'FCD5CE',
                };
                DB::table('stores')->insert([
                    'seller_id' => $seller_id,
                    'name' => $storeName,
                    'slug' => $slug,
                    'description' => "This is {$storeName} description",
                    'logo' => "https://via.assets.so/img.jpg?w=400&h=400&pattern=dots&fg=9333ea&gradientFrom=FFDDE1&gradientTo={$gradientTo}&gradientAngle=135&text=" . urlencode($storeName),
                    'banner' => "https://via.assets.so/img.jpg?w=600&h=300&pattern=dots&fg=9333ea&gradientFrom=FFDDE1&gradientTo={$gradientTo}&gradientAngle=135&text=" . urlencode($storeName),
                    'email' => "store{$i}_seller{$seller_id}@example.com",
                    'phone' => '1234567890',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
