<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     //her biri  10 tane faturası olan 20 müşteri ekliyoruz.
     Customer::factory()
     ->count(20)
     ->hasBills(10)
     ->create();
 //her biri  8 tane faturası olan 100 müşteri ekliyoruz.
     Customer::factory()
     ->count(100)
     ->hasBills(8)
     ->create();
//her biri  3 tane faturası olan 100 müşteri ekliyoruz.
     Customer::factory()
     ->count(100)
     ->hasBills(3)
     ->create();
//faturası olmayan 5 müşteri ekliyoruz.
     Customer::factory()
     ->count(5)
     ->create();
    }
}
