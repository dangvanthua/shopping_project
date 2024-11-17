<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
   
        // Thêm dữ liệu mẫu vào bảng category dành cho shop quần áo
        public function run(): void
        {
            DB::table('category')->insert([
                [
                    'id_category' => 1,
                    'category_name' => 'Vi cao cap',
                    'category_desc' => 'Danhmuc ',
                    'category_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_category' => 2,
                    'category_name' => 'Giay thoi thuong',
                    'category_desc' => 'Danhmuc ',
                    'category_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_category' => 3,
                    'category_name' => 'Thoi trang nam',
                    'category_desc' => 'Danhmuc ',
                    'category_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_category' => 4,
                    'category_name' => 'Thoi trang nu',
                    'category_desc' => 'danh cho nu',
                    'category_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_category' => 5,
                    'category_name' => 'Phu kien',
                    'category_desc' => 'Danh muc',
                    'category_status' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
        
}
