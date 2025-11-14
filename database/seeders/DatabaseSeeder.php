<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Seller;
use App\Models\Store;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        // CategorySeeder::class,
        // AttributeSeeder::class,
        // ProductSeeder::class,
        ]);
    }
}
