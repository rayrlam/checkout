<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rsses')->insert([
            'name' => 'NBC News',
            'channel'=>'UCeY0bbntWzzVIaj2z3QigXg',
        ]);

        DB::table('rsses')->insert([
            'name' => 'Sky News',
            'channel'=>'UCoMdktPbSTixAyNGwb-UYkQ',
        ]);

        DB::table('rsses')->insert([
            'name' => 'ABC News',
            'channel'=>'UCBi2mrWuNuyYy4gbM6fU18Q',
        ]);

        DB::table('rsses')->insert([
            'name' => 'CBS News',
            'channel'=>'UC8p1vwvWtl6T73JiExfWs1g',
        ]);

        DB::table('rsses')->insert([
            'name' => 'BBC News',
            'channel'=>'UC16niRr50-MSBwiO3YDb3RA',
        ]);

        DB::table('rsses')->insert([
            'name' => 'Fox News',
            'channel'=>'UCXIJgqnII2ZOINSWNOGFThA',
        ]);

        DB::table('rsses')->insert([
            'name' => 'CNN News',
            'channel'=>'UCupvZG-5ko_eiXAupbDfxWw',
        ]);
    }
}