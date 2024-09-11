<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            ['name' => 'LOCATION 001'],
            ['name' => 'LOCATION 002'],
        ]);

        DB::table('invoice_headers')->insert([
            ['location_id' => '1', 'date' => '2020-01-01', 'status' => 'draft'],
            ['location_id' => '1', 'date' => '2020-01-01', 'status' => 'open'],
            ['location_id' => '2', 'date' => '2020-01-01', 'status' => 'processed'],
        ]);

        DB::table('invoice_lines')->insert([
            ['id'=>'1','invoice_header_id' => '1', 'description' => 'line 001', 'value' => '10.00'],
            ['id'=>'2','invoice_header_id' => '2', 'description' => 'line 001', 'value' => '29.00'],
            ['id'=>'3','invoice_header_id' => '3', 'description' => 'line 001', 'value' => '1.00'],
            ['id'=>'4','invoice_header_id' => '1', 'description' => 'line 002', 'value' => '3.00'],
        ]);
    }
}