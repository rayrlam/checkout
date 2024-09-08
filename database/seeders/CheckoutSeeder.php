<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
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

        // create below rules for testing

        // DB::table('rules')->insert([
        //     'item_id' => 4,
        //     'method'=>0,
        //     'qtyorid'=>5,
        //     'sprice'=>20,
        //     'eprice'=>4.000000
        // ]);

        // DB::table('rules')->insert([
        //     'item_id' => 4,
        //     'method'=>0,
        //     'qtyorid'=>3,
        //     'sprice'=>27,
        //     'eprice'=>9.000000
        // ]);

        // DB::table('rules')->insert([
        //     'item_id' => 4,
        //     'method'=>0,
        //     'qtyorid'=>2,
        //     'sprice'=>20,
        //     'eprice'=>10.000000
        // ]);
    }
}