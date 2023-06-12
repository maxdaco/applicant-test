<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $product = new \App\Models\Product();
        $product->sku = 'apple';
        $product->name ='an apple';
        $product->description = 'an apple that is delightful to behold';
        $product->price=0.40;
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'banana';
        $product->name ='a banana';
        $product->description = 'a yellow banana';
        $product->price=0.90;
        $product->save();

        $product = new \App\Models\Product();
        $product->sku = 'bowl';
        $product->name ='a fruit bowl';
        $product->description = 'a bowl that is ideal for holding fruit';
        $product->price=2.60;
        $product->save();

    }
}
