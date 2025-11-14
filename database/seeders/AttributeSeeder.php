<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Columns
    // category_id - name - code - placeholder - helper_text - status - created_by->admin
    public function run(): void
    {
         DB::table('attributes')->insert([
             // ----------------- General Categories -----------------
             [ 'category_id' => 8, 'name' => 'Brand', 'code' => 'brand', 'placeholder' => 'Enter brand name', 'helper_text' => 'Specify the product brand' ],
             [ 'category_id' => 8, 'name' => 'Model', 'code' => 'model', 'placeholder' => 'Enter model', 'helper_text' => 'Model number or name of the product' ],
             [ 'category_id' => 8, 'name' => 'Warranty', 'code' => 'warranty', 'placeholder' => 'Enter warranty period', 'helper_text' => 'Specify duration in months or years' ],
             [ 'category_id' => 8, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'List available colors' ],
             [ 'category_id' => 8, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Cotton, Leather, Plastic, Metal, etc.' ],

             // ----------------- Electronics -----------------
             [ 'category_id' => 9, 'name' => 'Battery Life', 'code' => 'battery_life', 'placeholder' => 'Enter battery life', 'helper_text' => 'Specify battery duration in hours' ],
             [ 'category_id' => 9, 'name' => 'Screen Size', 'code' => 'screen_size', 'placeholder' => 'Enter screen size', 'helper_text' => 'Specify in inches' ],
             [ 'category_id' => 9, 'name' => 'Processor', 'code' => 'processor', 'placeholder' => 'Enter processor type', 'helper_text' => 'Intel i5, AMD Ryzen 7, Snapdragon 888, etc.' ],
             [ 'category_id' => 9, 'name' => 'RAM', 'code' => 'ram', 'placeholder' => 'Enter RAM', 'helper_text' => 'Specify in GB' ],
             [ 'category_id' => 9, 'name' => 'Storage Capacity', 'code' => 'storage_capacity', 'placeholder' => 'Enter storage', 'helper_text' => 'GB or TB' ],

             // ----------------- Fashion -----------------
             [ 'category_id' => 10, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'S, M, L, XL, XXL' ],
             [ 'category_id' => 10, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'List available colors' ],
             [ 'category_id' => 10, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Cotton, Silk, Polyester, Leather' ],
             [ 'category_id' => 10, 'name' => 'Pattern', 'code' => 'pattern', 'placeholder' => 'Enter pattern', 'helper_text' => 'Plain, Stripes, Floral, Checked' ],
             [ 'category_id' => 10, 'name' => 'Fit Type', 'code' => 'fit_type', 'placeholder' => 'Enter fit type', 'helper_text' => 'Slim, Regular, Loose' ],

             // ----------------- Home & Kitchen -----------------
             [ 'category_id' => 11, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],
             [ 'category_id' => 11, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Specify in kg or grams' ],
             [ 'category_id' => 11, 'name' => 'Material Type', 'code' => 'material_type', 'placeholder' => 'Enter material', 'helper_text' => 'Wood, Plastic, Stainless Steel, Ceramic, etc.' ],
             [ 'category_id' => 11, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'List main colors' ],
             [ 'category_id' => 11, 'name' => 'Capacity', 'code' => 'capacity', 'placeholder' => 'Enter capacity', 'helper_text' => 'Specify in liters or cups depending on product' ],

             // ----------------- Beauty & Personal Care -----------------
             [ 'category_id' => 12, 'name' => 'Skin Type', 'code' => 'skin_type', 'placeholder' => 'Enter skin type', 'helper_text' => 'Suitable for oily, dry, or combination skin' ],
             [ 'category_id' => 12, 'name' => 'Volume', 'code' => 'volume', 'placeholder' => 'Enter volume', 'helper_text' => 'Specify in ml or oz' ],
             [ 'category_id' => 12, 'name' => 'Ingredients', 'code' => 'ingredients', 'placeholder' => 'Enter ingredients', 'helper_text' => 'List main ingredients' ],
             [ 'category_id' => 12, 'name' => 'Fragrance', 'code' => 'fragrance', 'placeholder' => 'Enter fragrance', 'helper_text' => 'Rose, Jasmine, Citrus, etc.' ],
             [ 'category_id' => 12, 'name' => 'Form', 'code' => 'form', 'placeholder' => 'Enter form', 'helper_text' => 'Cream, Gel, Liquid, Powder' ],

             // ----------------- Sports & Outdoors -----------------
             [ 'category_id' => 13, 'name' => 'Sport Type', 'code' => 'sport_type', 'placeholder' => 'Enter sport type', 'helper_text' => 'Football, Basketball, Hiking, Yoga, etc.' ],
             [ 'category_id' => 13, 'name' => 'Weight Limit', 'code' => 'weight_limit', 'placeholder' => 'Enter weight limit', 'helper_text' => 'Maximum user weight in kg' ],
             [ 'category_id' => 13, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Polyester, Nylon, Rubber, Metal' ],
             [ 'category_id' => 13, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'S, M, L, XL, XXL' ],
             [ 'category_id' => 13, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main colors available' ],

             // ----------------- Groceries -----------------
             [ 'category_id' => 14, 'name' => 'Expiration Date', 'code' => 'expiration_date', 'placeholder' => 'YYYY-MM-DD', 'helper_text' => 'Use format YYYY-MM-DD' ],
             [ 'category_id' => 14, 'name' => 'Organic', 'code' => 'organic', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if the product is organic' ],
             [ 'category_id' => 14, 'name' => 'Net Weight', 'code' => 'net_weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Specify in grams or kg' ],
             [ 'category_id' => 14, 'name' => 'Ingredients', 'code' => 'ingredients', 'placeholder' => 'List ingredients', 'helper_text' => 'Main ingredients of the product' ],
             [ 'category_id' => 14, 'name' => 'Allergen Info', 'code' => 'allergen_info', 'placeholder' => 'Enter allergens', 'helper_text' => 'Specify common allergens present' ],

             // ----------------- Toys & Games -----------------
             [ 'category_id' => 15, 'name' => 'Age Range', 'code' => 'age_range', 'placeholder' => 'Enter age range', 'helper_text' => 'Suitable age in years' ],
             [ 'category_id' => 15, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Plastic, Wood, Fabric, Metal, etc.' ],
             [ 'category_id' => 15, 'name' => 'Safety Certification', 'code' => 'safety_cert', 'placeholder' => 'Enter certification', 'helper_text' => 'CE, ASTM, ISO, etc.' ],
             [ 'category_id' => 15, 'name' => 'Educational', 'code' => 'educational', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if it has educational value' ],
             [ 'category_id' => 15, 'name' => 'Number of Pieces', 'code' => 'pieces', 'placeholder' => 'Enter number of pieces', 'helper_text' => 'Applicable for sets or kits' ],
             // ----------------- Automotive -----------------
             [ 'category_id' => 16, 'name' => 'Fuel Type', 'code' => 'fuel_type', 'placeholder' => 'Enter fuel type', 'helper_text' => 'Petrol, Diesel, Electric, Hybrid' ],
             [ 'category_id' => 16, 'name' => 'Engine Capacity', 'code' => 'engine_capacity', 'placeholder' => 'Enter engine capacity', 'helper_text' => 'Specify in cc' ],
             [ 'category_id' => 16, 'name' => 'Transmission', 'code' => 'transmission', 'placeholder' => 'Automatic or Manual', 'helper_text' => 'Specify transmission type' ],
             [ 'category_id' => 16, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Vehicle exterior color' ],
             [ 'category_id' => 16, 'name' => 'Seats', 'code' => 'seats', 'placeholder' => 'Enter number of seats', 'helper_text' => 'Total number of seats in vehicle' ],

             // ----------------- Books -----------------
             [ 'category_id' => 17, 'name' => 'Author', 'code' => 'author', 'placeholder' => 'Enter author name', 'helper_text' => 'Full name of the author' ],
             [ 'category_id' => 17, 'name' => 'Publisher', 'code' => 'publisher', 'placeholder' => 'Enter publisher', 'helper_text' => 'Name of publishing house' ],
             [ 'category_id' => 17, 'name' => 'ISBN', 'code' => 'isbn', 'placeholder' => 'Enter ISBN', 'helper_text' => 'International Standard Book Number' ],
             [ 'category_id' => 17, 'name' => 'Language', 'code' => 'language', 'placeholder' => 'Enter language', 'helper_text' => 'Language of the book' ],
             [ 'category_id' => 17, 'name' => 'Pages', 'code' => 'pages', 'placeholder' => 'Enter number of pages', 'helper_text' => 'Total number of pages' ],

             // ----------------- Health & Wellness -----------------
             [ 'category_id' => 18, 'name' => 'Supplement Type', 'code' => 'supplement_type', 'placeholder' => 'Enter type', 'helper_text' => 'Vitamin, Protein, Mineral, etc.' ],
             [ 'category_id' => 18, 'name' => 'Dosage', 'code' => 'dosage', 'placeholder' => 'Enter dosage', 'helper_text' => 'Recommended amount per day' ],
             [ 'category_id' => 18, 'name' => 'Form', 'code' => 'form', 'placeholder' => 'Enter form', 'helper_text' => 'Pills, Powder, Liquid, Capsule' ],
             [ 'category_id' => 18, 'name' => 'Flavor', 'code' => 'flavor', 'placeholder' => 'Enter flavor', 'helper_text' => 'Applicable for chewable or drinkable supplements' ],
             [ 'category_id' => 18, 'name' => 'Ingredients', 'code' => 'ingredients', 'placeholder' => 'List ingredients', 'helper_text' => 'Main components of supplement' ],

             // ----------------- Pet Supplies -----------------
             [ 'category_id' => 19, 'name' => 'Pet Type', 'code' => 'pet_type', 'placeholder' => 'Enter pet type', 'helper_text' => 'Dog, Cat, Bird, etc.' ],
             [ 'category_id' => 19, 'name' => 'Food Type', 'code' => 'food_type', 'placeholder' => 'Enter food type', 'helper_text' => 'Dry, Wet, Treats, etc.' ],
             [ 'category_id' => 19, 'name' => 'Breed Specific', 'code' => 'breed_specific', 'placeholder' => 'Enter breed', 'helper_text' => 'Specify if suitable for a specific breed' ],
             [ 'category_id' => 19, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Weight of product/package in kg or grams' ],
             [ 'category_id' => 19, 'name' => 'Age Group', 'code' => 'age_group', 'placeholder' => 'Enter age group', 'helper_text' => 'Puppy, Adult, Senior, etc.' ],

             // ----------------- Office Supplies -----------------
             [ 'category_id' => 20, 'name' => 'Paper Size', 'code' => 'paper_size', 'placeholder' => 'Enter size', 'helper_text' => 'A4, A3, Letter, etc.' ],
             [ 'category_id' => 20, 'name' => 'Pages', 'code' => 'pages', 'placeholder' => 'Enter number of pages', 'helper_text' => 'Total pages in notebook or pack' ],
             [ 'category_id' => 20, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Available colors of paper or stationery' ],
             [ 'category_id' => 20, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Paper, Plastic, Cardboard, etc.' ],
             [ 'category_id' => 20, 'name' => 'Pack Quantity', 'code' => 'pack_quantity', 'placeholder' => 'Enter quantity', 'helper_text' => 'Number of items per pack' ],

             // ----------------- Jewelry & Accessories -----------------
             [ 'category_id' => 21, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Gold, Silver, Alloy, etc.' ],
             [ 'category_id' => 21, 'name' => 'Gemstone', 'code' => 'gemstone', 'placeholder' => 'Enter gemstone', 'helper_text' => 'Diamond, Ruby, Sapphire, etc.' ],
             [ 'category_id' => 21, 'name' => 'Length', 'code' => 'length', 'placeholder' => 'Enter length', 'helper_text' => 'Specify in cm or inches' ],
             [ 'category_id' => 21, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Specify in grams' ],
             [ 'category_id' => 21, 'name' => 'Closure Type', 'code' => 'closure_type', 'placeholder' => 'Enter closure type', 'helper_text' => 'Clasp, Hook, Snap, etc.' ],

             // ----------------- Mobile Phones -----------------
             [ 'category_id' => 22, 'name' => 'Operating System', 'code' => 'os', 'placeholder' => 'Enter OS', 'helper_text' => 'Android, iOS, etc.' ],
             [ 'category_id' => 22, 'name' => 'Storage Capacity', 'code' => 'storage', 'placeholder' => 'Enter storage', 'helper_text' => 'Specify in GB' ],
             [ 'category_id' => 22, 'name' => 'RAM', 'code' => 'ram', 'placeholder' => 'Enter RAM', 'helper_text' => 'Specify in GB' ],
             [ 'category_id' => 22, 'name' => 'Screen Type', 'code' => 'screen_type', 'placeholder' => 'Enter screen type', 'helper_text' => 'LCD, OLED, AMOLED, etc.' ],
             [ 'category_id' => 22, 'name' => 'Camera Resolution', 'code' => 'camera_resolution', 'placeholder' => 'Enter resolution', 'helper_text' => 'Specify megapixels' ],

             // ----------------- Smart Watches -----------------
             [ 'category_id' => 23, 'name' => 'Compatibility', 'code' => 'compatibility', 'placeholder' => 'Enter compatible devices', 'helper_text' => 'iOS, Android, etc.' ],
             [ 'category_id' => 23, 'name' => 'Battery Life', 'code' => 'battery_life', 'placeholder' => 'Enter battery life', 'helper_text' => 'Specify in hours or days' ],
             [ 'category_id' => 23, 'name' => 'Water Resistant', 'code' => 'water_resistant', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate water resistance' ],
             [ 'category_id' => 23, 'name' => 'Strap Material', 'code' => 'strap_material', 'placeholder' => 'Enter strap material', 'helper_text' => 'Leather, Silicone, Metal, etc.' ],
             [ 'category_id' => 23, 'name' => 'Display Type', 'code' => 'display_type', 'placeholder' => 'Enter display type', 'helper_text' => 'LCD, OLED, AMOLED, etc.' ],

             // ----------------- Laptops -----------------
             [ 'category_id' => 24, 'name' => 'Processor', 'code' => 'processor', 'placeholder' => 'Enter processor type', 'helper_text' => 'Intel i5, AMD Ryzen 7, etc.' ],
             [ 'category_id' => 24, 'name' => 'RAM', 'code' => 'ram', 'placeholder' => 'Enter RAM', 'helper_text' => 'Specify in GB' ],
             [ 'category_id' => 24, 'name' => 'Storage', 'code' => 'storage', 'placeholder' => 'Enter storage', 'helper_text' => 'SSD or HDD size in GB' ],
             [ 'category_id' => 24, 'name' => 'Graphics Card', 'code' => 'graphics_card', 'placeholder' => 'Enter GPU', 'helper_text' => 'Integrated or dedicated GPU' ],
             [ 'category_id' => 24, 'name' => 'Screen Size', 'code' => 'screen_size', 'placeholder' => 'Enter screen size', 'helper_text' => 'Specify in inches' ],

             // ----------------- Headphones -----------------
             [ 'category_id' => 25, 'name' => 'Type', 'code' => 'type', 'placeholder' => 'Enter type', 'helper_text' => 'Over-ear, In-ear, On-ear' ],
             [ 'category_id' => 25, 'name' => 'Connectivity', 'code' => 'connectivity', 'placeholder' => 'Enter connectivity', 'helper_text' => 'Wired, Wireless, Bluetooth' ],
             [ 'category_id' => 25, 'name' => 'Noise Cancellation', 'code' => 'noise_cancellation', 'placeholder' => 'Yes or No', 'helper_text' => 'Active or Passive noise cancellation' ],
             [ 'category_id' => 25, 'name' => 'Microphone', 'code' => 'microphone', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if headphones have mic' ],
             [ 'category_id' => 25, 'name' => 'Battery Life', 'code' => 'battery_life', 'placeholder' => 'Enter battery life', 'helper_text' => 'Hours of playback' ],
             // ----------------- Televisions -----------------
             [ 'category_id' => 26, 'name' => 'Screen Size', 'code' => 'screen_size', 'placeholder' => 'Enter screen size', 'helper_text' => 'Specify in inches' ],
             [ 'category_id' => 26, 'name' => 'Resolution', 'code' => 'resolution', 'placeholder' => 'Enter resolution', 'helper_text' => 'HD, Full HD, 4K, 8K' ],
             [ 'category_id' => 26, 'name' => 'Smart TV', 'code' => 'smart_tv', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if it has smart features' ],
             [ 'category_id' => 26, 'name' => 'Screen Type', 'code' => 'screen_type', 'placeholder' => 'Enter screen type', 'helper_text' => 'LED, OLED, QLED, LCD' ],
             [ 'category_id' => 26, 'name' => 'Refresh Rate', 'code' => 'refresh_rate', 'placeholder' => 'Enter refresh rate', 'helper_text' => 'Specify in Hz' ],

             // ----------------- Computer Components -----------------
             [ 'category_id' => 27, 'name' => 'Component Type', 'code' => 'component_type', 'placeholder' => 'Enter type', 'helper_text' => 'CPU, GPU, RAM, SSD, HDD, etc.' ],
             [ 'category_id' => 27, 'name' => 'Brand', 'code' => 'brand', 'placeholder' => 'Enter brand', 'helper_text' => 'Intel, AMD, Nvidia, Corsair, etc.' ],
             [ 'category_id' => 27, 'name' => 'Capacity', 'code' => 'capacity', 'placeholder' => 'Enter capacity', 'helper_text' => 'RAM in GB, Storage in GB/TB' ],
             [ 'category_id' => 27, 'name' => 'Speed', 'code' => 'speed', 'placeholder' => 'Enter speed', 'helper_text' => 'CPU clock speed in GHz, RAM in MHz' ],
             [ 'category_id' => 27, 'name' => 'Interface', 'code' => 'interface', 'placeholder' => 'Enter interface', 'helper_text' => 'PCIe, SATA, USB, etc.' ],

             // ----------------- Men Clothing -----------------
             [ 'category_id' => 28, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'S, M, L, XL, XXL' ],
             [ 'category_id' => 28, 'name' => 'Fit Type', 'code' => 'fit_type', 'placeholder' => 'Enter fit type', 'helper_text' => 'Slim, Regular, Loose' ],
             [ 'category_id' => 28, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Cotton, Polyester, Denim, etc.' ],
             [ 'category_id' => 28, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main colors available' ],
             [ 'category_id' => 28, 'name' => 'Sleeve Length', 'code' => 'sleeve_length', 'placeholder' => 'Enter sleeve length', 'helper_text' => 'Short, Long, Three-quarter' ],

             // ----------------- Women Clothing -----------------
             [ 'category_id' => 29, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'XS, S, M, L, XL, XXL' ],
             [ 'category_id' => 29, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Cotton, Silk, Polyester, etc.' ],
             [ 'category_id' => 29, 'name' => 'Dress Type', 'code' => 'dress_type', 'placeholder' => 'Enter dress type', 'helper_text' => 'Casual, Formal, Maxi, Mini, etc.' ],
             [ 'category_id' => 29, 'name' => 'Neckline', 'code' => 'neckline', 'placeholder' => 'Enter neckline', 'helper_text' => 'Round, V-neck, Collared, etc.' ],
             [ 'category_id' => 29, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main colors available' ],

             // ----------------- Kids Clothing -----------------
             [ 'category_id' => 30, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'Age-based sizes like 0-2, 3-5, 6-8, etc.' ],
             [ 'category_id' => 30, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Cotton, Polyester, Denim, etc.' ],
             [ 'category_id' => 30, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Available colors' ],
             [ 'category_id' => 30, 'name' => 'Pattern', 'code' => 'pattern', 'placeholder' => 'Enter pattern', 'helper_text' => 'Plain, Stripes, Cartoon Prints, etc.' ],
             [ 'category_id' => 30, 'name' => 'Sleeve Length', 'code' => 'sleeve_length', 'placeholder' => 'Enter sleeve length', 'helper_text' => 'Short, Long, Three-quarter' ],

             // ----------------- Footwear -----------------
             [ 'category_id' => 31, 'name' => 'Shoe Size', 'code' => 'shoe_size', 'placeholder' => 'Enter shoe size', 'helper_text' => 'US, UK, EU sizes' ],
             [ 'category_id' => 31, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Leather, Synthetic, Canvas, etc.' ],
             [ 'category_id' => 31, 'name' => 'Closure Type', 'code' => 'closure_type', 'placeholder' => 'Enter closure type', 'helper_text' => 'Lace-up, Slip-on, Velcro' ],
             [ 'category_id' => 31, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main available colors' ],
             [ 'category_id' => 31, 'name' => 'Sole Type', 'code' => 'sole_type', 'placeholder' => 'Enter sole type', 'helper_text' => 'Rubber, Leather, Synthetic, etc.' ],

             // ----------------- Bags & Backpacks -----------------
             [ 'category_id' => 32, 'name' => 'Capacity', 'code' => 'capacity', 'placeholder' => 'Enter capacity', 'helper_text' => 'Specify in liters' ],
             [ 'category_id' => 32, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Leather, Canvas, Polyester, etc.' ],
             [ 'category_id' => 32, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Available colors' ],
             [ 'category_id' => 32, 'name' => 'Closure Type', 'code' => 'closure_type', 'placeholder' => 'Enter closure type', 'helper_text' => 'Zipper, Buckle, Snap, etc.' ],
             [ 'category_id' => 32, 'name' => 'Compartments', 'code' => 'compartments', 'placeholder' => 'Enter number of compartments', 'helper_text' => 'Total compartments or pockets' ],

             // ----------------- Furniture -----------------
             [ 'category_id' => 33, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Wood, Metal, Plastic, etc.' ],
             [ 'category_id' => 33, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],
             [ 'category_id' => 33, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Specify in kg' ],
             [ 'category_id' => 33, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main color or finish' ],
             [ 'category_id' => 33, 'name' => 'Assembly Required', 'code' => 'assembly_required', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if assembly is needed' ],

             // ----------------- Home Decor -----------------
             [ 'category_id' => 34, 'name' => 'Type', 'code' => 'type', 'placeholder' => 'Enter type', 'helper_text' => 'Vase, Painting, Wall Art, Decorative Item, etc.' ],
             [ 'category_id' => 34, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Wood, Metal, Glass, Fabric, etc.' ],
             [ 'category_id' => 34, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main colors available' ],
             [ 'category_id' => 34, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],
             [ 'category_id' => 34, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Specify in kg' ],
             // ----------------- Kitchen Appliances -----------------
             [ 'category_id' => 35, 'name' => 'Power', 'code' => 'power', 'placeholder' => 'Enter power', 'helper_text' => 'Specify in watts' ],
             [ 'category_id' => 35, 'name' => 'Capacity', 'code' => 'capacity', 'placeholder' => 'Enter capacity', 'helper_text' => 'Liters or cups depending on appliance' ],
             [ 'category_id' => 35, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Stainless Steel, Plastic, Glass, etc.' ],
             [ 'category_id' => 35, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main color of appliance' ],
             [ 'category_id' => 35, 'name' => 'Voltage', 'code' => 'voltage', 'placeholder' => 'Enter voltage', 'helper_text' => 'Specify in Volts' ],

             // ----------------- Lighting -----------------
             [ 'category_id' => 36, 'name' => 'Bulb Type', 'code' => 'bulb_type', 'placeholder' => 'Enter bulb type', 'helper_text' => 'LED, Halogen, CFL, Incandescent, etc.' ],
             [ 'category_id' => 36, 'name' => 'Wattage', 'code' => 'wattage', 'placeholder' => 'Enter wattage', 'helper_text' => 'Specify in watts' ],
             [ 'category_id' => 36, 'name' => 'Color Temperature', 'code' => 'color_temperature', 'placeholder' => 'Enter color temperature', 'helper_text' => 'Warm, Cool, Daylight (Kelvin)' ],
             [ 'category_id' => 36, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Metal, Glass, Plastic, etc.' ],
             [ 'category_id' => 36, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],

             // ----------------- Fitness Equipment -----------------
             [ 'category_id' => 37, 'name' => 'Weight Limit', 'code' => 'weight_limit', 'placeholder' => 'Enter weight limit', 'helper_text' => 'Maximum user weight in kg' ],
             [ 'category_id' => 37, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],
             [ 'category_id' => 37, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Steel, Plastic, Rubber, etc.' ],
             [ 'category_id' => 37, 'name' => 'Type', 'code' => 'type', 'placeholder' => 'Enter type', 'helper_text' => 'Treadmill, Dumbbell, Exercise Bike, etc.' ],
             [ 'category_id' => 37, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Main color available' ],

             // ----------------- Camping & Hiking -----------------
             [ 'category_id' => 38, 'name' => 'Capacity', 'code' => 'capacity', 'placeholder' => 'Enter capacity', 'helper_text' => 'Number of people it can hold' ],
             [ 'category_id' => 38, 'name' => 'Weight', 'code' => 'weight', 'placeholder' => 'Enter weight', 'helper_text' => 'Weight of equipment in kg' ],
             [ 'category_id' => 38, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Polyester, Nylon, Aluminum, etc.' ],
             [ 'category_id' => 38, 'name' => 'Dimensions', 'code' => 'dimensions', 'placeholder' => 'Enter dimensions', 'helper_text' => 'Length x Width x Height in cm' ],
             [ 'category_id' => 38, 'name' => 'Waterproof', 'code' => 'waterproof', 'placeholder' => 'Yes or No', 'helper_text' => 'Indicate if product is waterproof' ],

             // ----------------- Sportswear -----------------
             [ 'category_id' => 39, 'name' => 'Size', 'code' => 'size', 'placeholder' => 'Enter size', 'helper_text' => 'S, M, L, XL, XXL' ],
             [ 'category_id' => 39, 'name' => 'Material', 'code' => 'material', 'placeholder' => 'Enter material', 'helper_text' => 'Polyester, Cotton, Spandex, etc.' ],
             [ 'category_id' => 39, 'name' => 'Color', 'code' => 'color', 'placeholder' => 'Enter color', 'helper_text' => 'Available colors' ],
             [ 'category_id' => 39, 'name' => 'Sport Type', 'code' => 'sport_type', 'placeholder' => 'Enter sport type', 'helper_text' => 'Running, Yoga, Gym, etc.' ],
             [ 'category_id' => 39, 'name' => 'Sleeve Length', 'code' => 'sleeve_length', 'placeholder' => 'Enter sleeve length', 'helper_text' => 'Short, Long, Sleeveless' ]
         ]);
    }
}
