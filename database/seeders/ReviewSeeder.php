<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('review')->insert([
            [
                'id_product' => 1,
                'id_customer' => 1,
                'comment' => 'Sản phẩm rất tốt, đúng như mô tả.',
                'image' => 'review1.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 2,
                'comment' => 'Chất lượng sản phẩm tuyệt vời.',
                'image' => 'review2.jpg',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 3,
                'comment' => 'Dịch vụ tốt và giao hàng nhanh.',
                'image' => 'review3.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 4,
                'comment' => 'Giá hợp lý và chất lượng.',
                'image' => 'review4.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 5,
                'comment' => 'Rất hài lòng với sản phẩm.',
                'image' => 'review5.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 6,
                'comment' => 'Sẽ quay lại mua lần sau.',
                'image' => 'review6.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 7,
                'comment' => 'Chất lượng sản phẩm tuyệt vời.',
                'image' => 'review7.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 8,
                'comment' => 'Đáng tiền và rất hài lòng.',
                'image' => 'review8.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 9,
                'comment' => 'Tuyệt vời! Sẽ giới thiệu cho bạn bè.',
                'image' => 'review9.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 10,
                'comment' => 'Không có gì để phàn nàn, quá tốt.',
                'image' => 'review10.jpg',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
