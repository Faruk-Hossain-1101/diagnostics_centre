<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            TestSeeder::class,
            CustomerSeeder::class,
            DoctorSeeder::class,
            DiscountSeeder::class,
            InvoiceSeeder::class,
        ]);
    }
}
