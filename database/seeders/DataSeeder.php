<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
                'name' => 'ray',
                'email' => 'rayrlam@yahoo.com.hk',
                'password' => '$2y$10$HkwD/XaSY3Yn3RvjRpoo1O82QfOR8IAWebTXenk.LJROG9HCwNNu.',
            ]
        );

        DB::table('items')->insert([
            'name' => 'A',
            'unitprice' => '50',
        ]);

        DB::table('items')->insert([
            'name' => 'B',
            'unitprice' => '30',
        ]);

        DB::table('items')->insert([
            'name' => 'C',
            'unitprice' => '20',
        ]);

        DB::table('items')->insert([
            'name' => 'D',
            'unitprice' => '15',
        ]);

        DB::table('items')->insert([
            'name' => 'E',
            'unitprice' => '5',
        ]);

        DB::table('rules')->insert([
            'item_id' => 1,
            'method'=>0,
            'qtyorid'=>3,
            'sprice'=>130.00,
            'eprice'=>43.333333
        ]);

        DB::table('rules')->insert([
            'item_id' => 2,
            'method'=>0,
            'qtyorid'=>2,
            'sprice'=>45.00,
            'eprice'=>22.500000
        ]);

        DB::table('rules')->insert([
            'item_id' => 3,
            'method'=>0,
            'qtyorid'=>2,
            'sprice'=>38.00,
            'eprice'=>19.000000
        ]);

        DB::table('rules')->insert([
            'item_id' => 3,
            'method'=>0,
            'qtyorid'=>3,
            'sprice'=>50.00,
            'eprice'=>16.666667
        ]);

        DB::table('rules')->insert([
            'item_id' => 4,
            'method'=>1,
            'qtyorid'=>1,
            'sprice'=>5.00,
            'eprice'=>5.000000
        ]);
    }
}