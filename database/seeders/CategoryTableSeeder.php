<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu mẫu vào bảng category dành cho shop quần áo
        DB::table('category')->insert([
            [
                'name' => 'Men',
                'description' => 'Clothing for men including shirts, pants, and jackets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Women',
                'description' => 'Clothing for women including dresses, skirts, and blouses',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bags',
                'description' => 'Different types of bags including handbags, backpacks, and wallets',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Shoes',
                'description' => 'Various types of shoes including sneakers, boots, and sandals',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Watches',
                'description' => 'Various types of watches including digital and analog models',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
