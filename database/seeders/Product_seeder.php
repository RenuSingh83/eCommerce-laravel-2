<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
class Product_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::truncate();
        $ProductCount=50;

       Product::factory($ProductCount)->create()->each(function ($product) {
        $product->gallery = $product->id . '.jpg';
        $product->save();
    });
       //OR
//Product::factory()->count(50)->create();

        //
    }
}
