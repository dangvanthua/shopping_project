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
                'name' => 'Quần lửng mặc cực đẹp',
                'describe' => 'Áo sơ mi nam cao cấp, chất liệu vải cotton',
                'price' => 200000,
                'images' => '1-1.jpg',
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
                'images' => '30-1.jpg',
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
                'images' => '11-2.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 1,
                'name' => 'Áo thun nam',
                'describe' => 'Áo thun nam phong cách, chất liệu vải co giãn',
                'price' => 150000,
                'images' => '11-3.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 1,
                'name' => 'Quần nam',
                'describe' => 'Áo thun nam phong cách, chất liệu vải co giãn',
                'price' => 150000,
                'images' => '16-2.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 1,
                'name' => 'Quần dài cho nam',
                'describe' => 'Áo thun nam phong cách, chất liệu vải co giãn',
                'price' => 150000,
                'images' => '9-6.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Váy cho nữ',
                'describe' => 'Váy cho nữ',
                'price' => 150000,
                'images' => '16-1.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Quần dài cho nữ',
                'describe' => 'Quần dài cho nữ',
                'price' => 150000,
                'images' => '21-6.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Áo khoác nữ',
                'describe' => 'Áo khoác nữ',
                'price' => 150000,
                'images' => '26-1.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Áo thun cho nữ',
                'describe' => 'Áo thun cho nữ',
                'price' => 250000,
                'images' => '23-6.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Áo croptop nữ thời thượng',
                'describe' => 'Áo croptop nữ năng động, cá tính',
                'price' => 250000,
                'images' => '24-4.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 2,
                'name' => 'Váy maxi nữ đi biển',
                'describe' => 'Váy maxi nữ, chất liệu nhẹ nhàng, phù hợp đi biển',
                'price' => 250000,
                'images' => '24-5.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 1,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 6,
            ],
            [
                'id_category' => 1,
                'name' => 'Áo khoác bomber nam',
                'describe' => 'Áo bomber nam, phong cách cá tính',
                'price' => 400000,
                'images' => '22-5.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 4,
            ],
            [
                'id_category' => 1,
                'name' => 'Áo len nam cao cấp',
                'describe' => 'Áo len nam giữ ấm tốt, phù hợp mùa đông',
                'price' => 320000,
                'images' => '24-1.jpg',
                'category_status' => 0,
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 90,
            ],
            [
                'id_category' => 1,
                'name' => 'Quần lửng nam thoải mái',
                'describe' => 'Quần lửng nam với thiết kế đơn giản nhưng tiện lợi',
                'price' => 200000,
                'images' => '30-1.jpg',
                'category_status' => 0,
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 10,
            ],
            [
                'id_category' => 1,
                'name' => 'Áo khoác nam chống nắng',
                'describe' => 'Áo khoác nam, thiết kế thời trang và bảo vệ da',
                'price' => 200000,
                'images' => '25-4.jpg',
                'category_status' => 0, // Thêm giá trị category_status
                'product_status' => 0,
                'hot' => 0,
                'is_active' => 1,
                'sale' => 1,
                'number_of_purchases' => 40,
                'quantity_available' => 5,
            ],
        ]);
    }

}
