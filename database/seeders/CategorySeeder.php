<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the category seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Clothing',
            'parent_id' => 0,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Accessories',
            'parent_id' => 0,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Watches',
            'parent_id' => 0,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Women',
            'parent_id' => 1,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Men',
            'parent_id' => 1,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Tops',
            'parent_id' => 4,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'Trousers',
            'parent_id' => 4,
            ]
        );

        DB::table('categories')->insert([
            'name' => 'T-Shirts',
            'parent_id' => 5,
            ]
        );
    }
}