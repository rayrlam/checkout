<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['country_name' => 'UK'],
            ['country_name' => 'USA'],
            ['country_name' => 'ITALY'],
        ]);

        DB::table('buildings')->insert([
            ['building_name' => 'Isaac Newton', 'country_id' => '1'],
            ['building_name' => 'Oscar Wilde',  'country_id' => '1'],
            ['building_name' => 'Charles Darwin', 'country_id' => '1'],
            ['building_name' => 'Benjamin Franklin', 'country_id' => '2'],
            ['building_name' => 'Luciano Pavarotti', 'country_id' => '3'],
        ]);

        DB::table('departments')->insert([
            ['department_name' => 'development', 'building_id' => '1'],
            ['department_name' => 'accounting', 'building_id' => '1'],
            ['department_name' => 'HR', 'building_id' => '2'],
            ['department_name' => 'sales', 'building_id' => '2'],
            ['department_name' => 'headquarters', 'building_id' => '3'],
            ['department_name' => 'development', 'building_id' => '4'],
            ['department_name' => 'sales', 'building_id' => '4'],
            ['department_name' => 'development', 'building_id' => '5'],
            ['department_name' => 'sales', 'building_id' => '5'],
            // ['department_name' => 'director', 'building_id' => '1'],
            // ['department_name' => 'director', 'building_id' => '2'],
            ['department_name' => 'director', 'building_id' => '3'],
            // ['department_name' => 'director', 'building_id' => '4'],
            // ['department_name' => 'director', 'building_id' => '5'],
        ]);

        DB::table('employees')->insert([
            ['first_name' => 'Julius', 'last_name' => 'Caesar', 'rfid'=>'142594708f3a5a3ac2980914a0fc954f', 'joined_at'=>'2012-01-11 00:00:00', 'left_at'=>null],
            ['first_name' => 'John', 'last_name' => 'Deon', 'rfid'=>'3ac2980914a0fc954f142594708f3a5a', 'joined_at'=>'2013-02-22 00:00:00', 'left_at'=>null],
            ['first_name' => 'Peter', 'last_name' => 'Pan', 'rfid'=>'1425947954f08f3a5a3ac2980914a0fc', 'joined_at'=>'2014-03-13 00:00:00', 'left_at'=>null],
            ['first_name' => 'David', 'last_name' => 'Bradley', 'rfid'=>'594708f3a5a3ac2980914a1420fc954f', 'joined_at'=>'2015-06-20 00:00:00', 'left_at'=>null],
            ['first_name' => 'Tom', 'last_name' => 'Hardy', 'rfid'=>'708f3a5a3ac2142594980914a0fc954f', 'joined_at'=>'2016-11-08 00:00:00', 'left_at'=>null],
            ['first_name' => 'Mary', 'last_name' => 'Berry', 'rfid'=>'954f708f3a5a3ac2142594980914a0fc', 'joined_at'=>'2016-12-28 00:00:00', 'left_at'=>null],
            ['first_name' => 'Bob', 'last_name' => 'Marley', 'rfid'=>'000f708f3a5a3ac2142594980914a0fc', 'joined_at'=>'2016:12:30 00:00:00', 'left_at'=>'2021-12-30 00:00:00']
        ]);

        DB::table('employee_departments')->insert([
            ['employee_id' => '1', 'department_id' => '10'],
            ['employee_id' => '1', 'department_id' => '1'],
            ['employee_id' => '2', 'department_id' => '2'],
            ['employee_id' => '2', 'department_id' => '3'],
            ['employee_id' => '3', 'department_id' => '4'],
            ['employee_id' => '3', 'department_id' => '7'],
            ['employee_id' => '3', 'department_id' => '9'],
            ['employee_id' => '4', 'department_id' => '6'],
            ['employee_id' => '5', 'department_id' => '1'],
            ['employee_id' => '5', 'department_id' => '6'],
            ['employee_id' => '6', 'department_id' => '5'],
            ['employee_id' => '6', 'department_id' => '8'],
            ['employee_id' => '7', 'department_id' => '1'],
            ['employee_id' => '7', 'department_id' => '2'],
        ]);   
    }
}