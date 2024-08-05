<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'name'=>'Iphone 14 promax',
            'price'=> 25000
        ]);
        Product::create([
            'name'=>'Iphone 15 promax',
            'price'=> 27000
        ]);
        Product::create([
            'name'=>'Iphone 12 promax',
            'price'=> 10000
        ]);
    }
}
