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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            CheckoutSeeder::class,
            QuotationSeeder::class,
            InvoiceSeeder::class,
            RssSeeder::class,
            CqrsProductSeeder::class,
        ]);
    }
}
