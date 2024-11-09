<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('order_item')->insert([
            [
                'id_order' => 1,
                'id_product' => 1,
                'quantity' => 2,
                'price' => 500000,
                'status' => 'In Stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 1,
                'id_product' => 2,
                'quantity' => 1,
                'price' => 500000,
                'status' => 'In Stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 2,
                'id_product' => 3,
                'quantity' => 3,
                'price' => 400000,
                'status' => 'Shipped',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 3,
                'id_product' => 1,
                'quantity' => 4,
                'price' => 375000,
                'status' => 'Delivered',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 4,
                'id_product' => 4,
                'quantity' => 2,
                'price' => 300000,
                'status' => 'Cancelled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 5,
                'id_product' => 5,
                'quantity' => 1,
                'price' => 250000,
                'status' => 'Processing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 5,
                'id_product' => 3,
                'quantity' => 2,
                'price' => 125000,
                'status' => 'Processing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_order' => 3,
                'id_product' => 2,
                'quantity' => 3,
                'price' => 120000,
                'status' => 'Delivered',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
