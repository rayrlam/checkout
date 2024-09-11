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
            ['location_id' => '2', 'date' => '2020-02-21', 'status' => 'draft'],
            ['location_id' => '2', 'date' => '2020-03-18', 'status' => 'open'],
            ['location_id' => '2', 'date' => '2020-04-01', 'status' => 'processed'],
            ['location_id' => '2', 'date' => '2020-04-01', 'status' => 'draft'],
        ]);

        DB::table('invoice_lines')->insert([
            ['id'=>'1','invoice_header_id' => '1', 'description' => 'line 001', 'value' => '10.00'],
            ['id'=>'2','invoice_header_id' => '2', 'description' => 'line 001', 'value' => '29.00'],
            ['id'=>'3','invoice_header_id' => '3', 'description' => 'line 001', 'value' => '1.00'],
            ['id'=>'4','invoice_header_id' => '1', 'description' => 'line 002', 'value' => '3.00'],
            ['id'=>'5','invoice_header_id' => '4', 'description' => 'line 003', 'value' => '13.50'],
            ['id'=>'6','invoice_header_id' => '4', 'description' => 'line 004', 'value' => '2.99'],
            ['id'=>'7','invoice_header_id' => '5', 'description' => 'line 003', 'value' => '5.00'],
            ['id'=>'8','invoice_header_id' => '6', 'description' => 'line 004', 'value' => '4.00'],
            ['id'=>'9','invoice_header_id' => '6', 'description' => 'line 003', 'value' => '7.50'],
            ['id'=>'10','invoice_header_id' => '6', 'description' => 'line 003', 'value' => '1.50'],
        ]);
    }
}