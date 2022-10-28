<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory()->count(25)->hasInvoices(10)->create();
        \App\Models\Customer::factory()->count(100)->hasInvoices(5)->create();
        \App\Models\Customer::factory()->count(100)->hasInvoices(3)->create();
        \App\Models\Customer::factory()->count(5)->create();
    }
}
