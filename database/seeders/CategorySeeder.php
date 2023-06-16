<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'name' => 'Mobiles',
                'description' => 'Shop latest trending collection of mobiles.',
                'status' => 1
            ],
            [
                'name' => 'Laptops',
                'description' => 'Shop latest trending collection of laptops.',
                'status' => 1
            ],
            [
                'name' => 'Earphones',
                'description' => 'Shop latest trending collection of earphones.',
                'status' => 1
            ],
            [
                'name' => 'Earpods',
                'description' => 'Shop latest trending collection of earpods.',
                'status' => 1
            ],
        );
    }
}
