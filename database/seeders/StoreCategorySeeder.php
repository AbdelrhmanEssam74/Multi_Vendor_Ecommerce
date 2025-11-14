<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = range(8, 39); // IDs of categories
        $stores = DB::table('stores')->pluck('store_id'); // Get all store IDs

        foreach ($stores as $store_id) {
            // Assign 3 random categories to each store
            $assignedCategories = array_rand(array_flip($categories), 3);
            foreach ($assignedCategories as $category_id) {
                DB::table('category_store')->insert([
                    'store_id' => $store_id,
                    'category_id' => $category_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
