<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            $product = new \App\Product();
            $product->name = str_random(20);
            $product->price = rand(1, 200);
            $product->save();
        }
    }
}
