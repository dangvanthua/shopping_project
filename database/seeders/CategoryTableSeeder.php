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
                'category_name' => 'Thời trang nam',
                'category_desc' => 'Thời trang nam',
                'category_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_category' => 2,
                'category_name' => 'Thời trang nữ',
                'category_desc' => 'Thời trang nữ',
                'category_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
