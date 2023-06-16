<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
            'name' =>  'Nokia 5',
            'category_id' => 1,
            'description' => 'You can update',
            'quantity' => 10,
            'weight' => 1,
            'price' => 12000,
            'sale_price' => 10000,
            'status' => 1,
            'image' => ''
            ],
            [
                'name' =>  'Realme C35',
                'category_id' => 1,
                'description' => 'You can update',
                'quantity' => 10,
                'weight' => 1,
                'price' => 15000,
                'sale_price' => 12000,
                'status' => 1,
                'image' => ''
            ],
            [
                'name' =>  'Redmi 5',
                'category_id' => 1,
                'description' => 'You can update',
                'quantity' => 10,
                'weight' => 1,
                'price' => 18000,
                'sale_price' => 15000,
                'status' => 1,
                'image' => ''
            ]
        );
    }
}
