<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([

            // GENERAL
            [
                'category_name' => 'General Categories',
                'category_slug' => 'general-categories',
                'category_image' => 'general.jpg',
                'parent_id' => null,
                'status' => 1,
            ],

            // MAIN CATEGORIES (parent_id = 8)
            [
                'category_name' => 'Electronics',
                'category_slug' => 'electronics',
                'category_image' => 'electronics.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Fashion',
                'category_slug' => 'fashion',
                'category_image' => 'fashion.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Home & Kitchen',
                'category_slug' => 'home-kitchen',
                'category_image' => 'home-kitchen.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Beauty & Personal Care',
                'category_slug' => 'beauty-personal-care',
                'category_image' => 'beauty.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Sports & Outdoors',
                'category_slug' => 'sports-outdoors',
                'category_image' => 'sports.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Groceries',
                'category_slug' => 'groceries',
                'category_image' => 'groceries.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Toys & Games',
                'category_slug' => 'toys-games',
                'category_image' => 'toys.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Automotive',
                'category_slug' => 'automotive',
                'category_image' => 'automotive.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Books',
                'category_slug' => 'books',
                'category_image' => 'books.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Health & Wellness',
                'category_slug' => 'health-wellness',
                'category_image' => 'health.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Pet Supplies',
                'category_slug' => 'pet-supplies',
                'category_image' => 'pets.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Office Supplies',
                'category_slug' => 'office-supplies',
                'category_image' => 'office.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],
            [
                'category_name' => 'Jewelry & Accessories',
                'category_slug' => 'jewelry-accessories',
                'category_image' => 'jewelry.jpg',
                'parent_id' => 8,
                'status' => 1,
            ],

            // ELECTRONICS SUBCATEGORIES (parent_id = 9)
            [
                'category_name' => 'Mobile Phones',
                'category_slug' => 'mobile-phones',
                'category_image' => 'mobile.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],
            [
                'category_name' => 'Smart Watches',
                'category_slug' => 'smart-watches',
                'category_image' => 'smartwatch.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],
            [
                'category_name' => 'Laptops',
                'category_slug' => 'laptops',
                'category_image' => 'laptops.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],
            [
                'category_name' => 'Headphones',
                'category_slug' => 'headphones',
                'category_image' => 'headphones.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],
            [
                'category_name' => 'Televisions',
                'category_slug' => 'televisions',
                'category_image' => 'tv.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],
            [
                'category_name' => 'Computer Components',
                'category_slug' => 'computer-components',
                'category_image' => 'components.jpg',
                'parent_id' => 9,
                'status' => 1,
            ],

            // FASHION SUBCATEGORIES (parent_id = 10)
            [
                'category_name' => 'Men Clothing',
                'category_slug' => 'men-clothing',
                'category_image' => 'men.jpg',
                'parent_id' => 10,
                'status' => 1,
            ],
            [
                'category_name' => 'Women Clothing',
                'category_slug' => 'women-clothing',
                'category_image' => 'women.jpg',
                'parent_id' => 10,
                'status' => 1,
            ],
            [
                'category_name' => 'Kids Clothing',
                'category_slug' => 'kids-clothing',
                'category_image' => 'kids.jpg',
                'parent_id' => 10,
                'status' => 1,
            ],
            [
                'category_name' => 'Footwear',
                'category_slug' => 'footwear',
                'category_image' => 'footwear.jpg',
                'parent_id' => 10,
                'status' => 1,
            ],
            [
                'category_name' => 'Bags & Backpacks',
                'category_slug' => 'bags-backpacks',
                'category_image' => 'bags.jpg',
                'parent_id' => 10,
                'status' => 1,
            ],

            // HOME & KITCHEN SUBCATEGORIES (parent_id = 11)
            [
                'category_name' => 'Furniture',
                'category_slug' => 'furniture',
                'category_image' => 'furniture.jpg',
                'parent_id' => 11,
                'status' => 1,
            ],
            [
                'category_name' => 'Home Decor',
                'category_slug' => 'home-decor',
                'category_image' => 'decor.jpg',
                'parent_id' => 11,
                'status' => 1,
            ],
            [
                'category_name' => 'Kitchen Appliances',
                'category_slug' => 'kitchen-appliances',
                'category_image' => 'kitchen.jpg',
                'parent_id' => 11,
                'status' => 1,
            ],
            [
                'category_name' => 'Lighting',
                'category_slug' => 'lighting',
                'category_image' => 'lighting.jpg',
                'parent_id' => 11,
                'status' => 1,
            ],

            // SPORTS SUBCATEGORIES (parent_id = 13)
            [
                'category_name' => 'Fitness Equipment',
                'category_slug' => 'fitness-equipment',
                'category_image' => 'fitness.jpg',
                'parent_id' => 13,
                'status' => 1,
            ],
            [
                'category_name' => 'Camping & Hiking',
                'category_slug' => 'camping-hiking',
                'category_image' => 'camping.jpg',
                'parent_id' => 13,
                'status' => 1,
            ],
            [
                'category_name' => 'Sportswear',
                'category_slug' => 'sportswear',
                'category_image' => 'sportswear.jpg',
                'parent_id' => 13,
                'status' => 1,
            ],

        ]);
    }
}
