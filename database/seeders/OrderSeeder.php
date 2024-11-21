<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('order')->insert([
            [
                'id_order' => 1,
                'id_customer' => 1,
                'id_shipping_method' => 1,
                'id_payment' => 1,
                'total_item' => 500000,
                'status' => 'Pending',
                'shipping_address' => '123 Đường ABC, TP. Hồ Chí Minh',
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_payment' => 2,
                'id_customer' => 2,
                'id_shipping_method' => 2,
                'total_amount' => 2000000,
                'status' => 'Shipped',
                'address' => '456 Đường XYZ, TP. Hà Nội',
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_payment' => 1,
                'id_customer' => 3,
                'id_shipping_method' => 1,
                'total_amount' => 1500000,
                'status' => 'Delivered',
                'address' => '789 Đường DEF, TP. Đà Nẵng',
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_payment' => 3,
                'id_customer' => 4,
                'id_shipping_method' => 2,
                'total_amount' => 3000000,
                'status' => 'Cancelled',
                'address' => '321 Đường GHI, TP. Cần Thơ',
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_payment' => 2,
                'id_customer' => 5,
                'id_shipping_method' => 1,
                'total_amount' => 2500000,
                'address' => '654 Đường JKL, TP. Hải Phòng',
                'id_order' => 2,
                'id_customer' => 2,
                'id_shipping_method' => 2,
                'id_payment' => 2,
                'total_item' => 800000,
                'status' => 'Completed',
                'shipping_address' => '456 Đường DEF, Hà Nội',
                'order_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
