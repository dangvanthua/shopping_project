<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('product')->insert([
            [
                'id_category' => 1,
                'name' => 'Áo sơ mi nam',
                'describe' => 'Áo sơ mi nam cao cấp, chất liệu vải cotton',
                'price' => 200000,
                'images' => 'shirt.jpg',
                'category_status' => 1, // Thêm giá trị category_status
                'product_status' => 1,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 50,
                'quantity_available' => 100,
            ],
            [
                'id_category' => 2,
                'name' => 'Quần jean nữ',
                'describe' => 'Quần jean nữ, thời trang cao cấp',
                'price' => 300000,
                'images' => 'jeans.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 0,
                'number_of_purchases' => 30,
                'quantity_available' => 80,
            ],
            [
                'id_category' => 1,
                'name' => 'Áo thun nam',
                'describe' => 'Áo thun nam phong cách, chất liệu vải co giãn',
                'price' => 150000,
                'images' => 'tshirt.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
        ]);
    }

}
