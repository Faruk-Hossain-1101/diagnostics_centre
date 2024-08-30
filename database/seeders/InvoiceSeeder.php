<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\CustomerTest;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::factory()
            ->count(10)  // Creates 10 invoices
            ->has(CustomerTest::factory()->count(3))  // Each invoice has 3 associated tests
            ->create();
    }
}
